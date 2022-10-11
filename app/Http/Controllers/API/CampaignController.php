<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Campaign;
use App\Models\CreditPoint;
use App\Models\CreditPundi;
use Illuminate\Http\Request;
use App\Models\CampaignPriceList;
use Illuminate\Support\Facades\DB;
use App\Models\BallanceTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CampaignController extends Controller
{

    public function index ()
    {
        $id = auth('sanctum')->user()->id;
        $dataCampaign = User::find($id);
        $data = $dataCampaign->campaign()->get();
        
        return response()->json([
            'message' => 'Success',
            'data' => $data
        ]);
    }

    public function campaign () {
        $data = Campaign::all();

        return response()->json([
            'message' => 'Success',
            'data' => $data
        ]);
    }

    public function store (Request $request, CreditPundi $id)
    {
       DB::beginTransaction();
        $priceView = CampaignPriceList::first();
        $priceSubscribe = CampaignPriceList::find(2);

        $validator = Validator::make($request->all(),[
            'campaign_type_id' => 'required',
            'campaign_category_id' => 'required',
            'link' => 'required',
            'current_views' => '',
            'current_subscribes' => '', 
            'watch_time' => '',
            'number_of_subscribes' => '',
            'method_payment' => 'required',
            'price' => '',
            'total' => '',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

            // Method Payment
            $methodPayment = "";
                if ($request->method_payment == 0) {
                    $methodPayment = "Credit Pundi";
                } else {
                    $methodPayment = "Credit Point";
                }
        
        // Price
            $price = "";
                    if ($request->campaign_type_id == 1) {
                        $price = $priceView->price; 
                    } else {
                        $price = $priceSubscribe->price; 
                    }

        // Total
            $total = "";
                if ($request->campaign_type_id == 1) {
                    $total = $price * $request->watch_time; 
                } else {
                    $total = $price * $request->number_of_subscribes; 
                }
            

        $data = Campaign::create([
            'user_id' => auth('sanctum')->user()->id,
            'campaign_type_id' => $request->campaign_type_id,
            'campaign_category_id' => $request->campaign_category_id,
            'link' => $request->link,
            'current_views' => $request->current_views ?? 0,
            'current_subscribes' => $request->current_subscribes ?? 0,
            'watch_time' => $request->watch_time,
            'number_of_subscribes' => $request->number_of_subscribes,
            'method_payment' => $methodPayment,
            'price' => $price,
            'total' => $total,
         ]);


         //  update credit Pundi
         $dataUser = User::find(auth('sanctum')->user()->id);

            if ($data->method_payment == "Credit Pundi") {
                $idCreditPundi = $dataUser->creditPundi()->get();

                foreach ($idCreditPundi as $item ) 
                {
                    $id = $item->id;
                    $ballance = $item->ballance;

                }
                
                $dataTransaction = $ballance - $data->total;

                CreditPundi::where('id', $id)->update([
                    'ballance' => $dataTransaction
                ]);
            } else {
                $idCreditPoint = $dataUser->creditPoint()->get();

                foreach ($idCreditPoint as $item ) 
                {
                    $id = $item->id;
                    $ballance = $item->ballance;

                }
                
                $dataTransaction = $ballance - $data->total;

                CreditPoint::where('id', $id)->update([
                    'ballance' => $dataTransaction
                ]);
            }
            
        DB::commit();

        return response()->json(
            [
                'message' => " Data success saved..!",
                'data' => $data
            ]
        );
    }   
}