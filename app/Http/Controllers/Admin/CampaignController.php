<?php

namespace App\Http\Controllers\Admin;

use App\Models\Campaign;
use App\Models\CampaignType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CampaignController extends Controller
{
  
    public function index()
    {
        $dataCampaign = Campaign::all();
        $jumlahCampaign = Campaign::count();

        return view('pages.campaign.index', compact('dataCampaign', 'jumlahCampaign'));
    }

    
    public function show($id)
    {
        $dataCampaign = Campaign::find($id);

        return view('pages.campaign.campaign_detail', compact('dataCampaign'));
    }

    public function campaignView ()
    {
        $data = CampaignType::find(1);

        $dataCampaign = $data->campaign()->get();

        $jumlahCampaign = $dataCampaign->count();

        return view('pages.campaign.campaign_view', compact('dataCampaign', 'jumlahCampaign'));
    }


    public function campaignSubscribe ()
    {
        $data = CampaignType::find(2);

        $dataCampaign = $data->campaign()->inRandomOrder();

        $jumlahCampaign = $dataCampaign->count();

        return view('pages.campaign.campaign_subscribe', compact('dataCampaign', 'jumlahCampaign'));
    }
}