<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\EarnPriceList;
use App\Models\CampaignPriceList;
use App\Http\Controllers\Controller;

class PriceController extends Controller
{
    public function index()
    {
        $campaignPrice = CampaignPriceList::all();
        $earnPrice = EarnPriceList::all();

        return view('pages.pundi.index', compact('campaignPrice', 'earnPrice'));
    }

    // Campaign Price
        public function createCampaignPrice()
        {
            return view('pages.pundi.campaign_prices.create_campaign');
        }

        public function campaignPriceStore(Request $request)
        {
            $message = [
                'required' => 'data must be filled..!',
            ];

            $validasi = $request->validate([
                'price_type_id' => 'required',
                'price' => 'required|numeric',
                'sale'=> 'required',
                'is_active' => '',
                'created_by' => '',
            ], $message);

            $validasi['created_by'] = auth('sanctum')->user()->id;
            $validasi['is_active'] = $validasi['is_active'] ?? 0;

            CampaignPriceList::create($validasi);

            return redirect('pundi')->with([
                'succes' => 'data saved successfully'
            ]);
        }


        public function editCampaignPrice($id)
        {
            $data = CampaignPriceList::find($id);

            return view('pages.pundi.campaign_prices.edit_campaign_price', compact('data'));
        }


        public function updateCampaignPrice (Request $request, $id)
        {

            // $dataPrice = CampaignPriceList::find($id);


            $message = [
                'required' => 'data must be filled..!',
            ];

            $validator = Validator::make($request->all(),[
                'price_type_id' => 'required',
                'price' => 'required|numeric',
                'sale'=> 'required',
                'is_active' => '',
                'created_by' => '',
            ], $message);


            CampaignPriceList::update([
                'price_type_id' => $dataPrice->price_type_id,
                'price' => $request->price,
                'sale'=> $request->sale,
                'is_active' => $request->is_active,
                'created_by' => auth('sanctum')->user()->id,

            ]);

            return redirect('pundi')->with([
                'succes' => 'data saved successfully'
            ]);
        }

    

    // Earn Price
        public function earnPriceCreate()
        {
            return view('pages.pundi.ern_prices.form_earn_create');
        }

        public function earnPriceStore(Request $request)
        {
            $message = [
                'required' => 'data must be filled..!',
            ];

            $validasi = $request->validate([
                'price_type_id' => 'required',
                'price' => 'required|numeric',
                'price_lv_1' => 'required|numeric',
                'price_lv_2'=> 'required|numeric',
                'is_active' => '',
                'created_by' => '',
            ], $message);

            // $validasi['created_by'] = auth()->user()->id;
            $validasi['created_by'] = auth('sanctum')->user()->id;
            $validasi['is_active'] = $validasi['is_active'] ?? 0;

            EarnPriceList::create($validasi);

            return redirect('pundi')->with([
                'success' => 'data saved successfully'
            ]);
        }
}