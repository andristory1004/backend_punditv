<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\EarnPriceList;
use App\Models\CampaignPriceList;
use App\Http\Controllers\Controller;

class PriceListController extends Controller
{
    public function campaignPrice ()
    {
        $data = CampaignPriceList::all();

        return response()->json([
            'message'   => 'Success showing data..!',
            'data'      => $data
        ]);   
    }

    public function earnPrice ()
    {
        $data = EarnPriceList::all();

        return response()->json([
            'message'   => 'Success showing data..!',
            'data'      => $data
        ]);
        
        
    }
}