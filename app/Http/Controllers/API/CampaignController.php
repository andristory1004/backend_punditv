<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Campaign;
use App\Models\CreditPundi;
use Illuminate\Http\Request;
use App\Models\CampaignPriceList;
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

    public function store (Request $request)
    {

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
            'price' => '',
            'total' => '',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $price = "";
                if ($request->campaign_type_id == 1) {
                    $price = $priceView->price; 
                } else {
                    $price = $priceSubscribe->price; 
                }
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
            'price' => $price,
            'total' => $total,
         ]);
         
        return response()->json(
            [
                'message' => " Data success saved..!",
                'data' => $data
            ]
        );

        $dataUser = User::find(auth('sanctum')->user()->id);
        $creditPundi = $dataUser->creditPundi()->get();
    

        CreditPundi::update([
            'user_id' => auth('sanctum')->user()->id,
            'name' => $creditPundi->name,
            'ballance' => $creditPundi->ballance - $data->total
        ]);
    }   
}