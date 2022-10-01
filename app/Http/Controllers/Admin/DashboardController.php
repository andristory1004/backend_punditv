<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index ()
    {
        $role = User::first();
        $dataUser = $role->count();
        $dataCampaign = Campaign::count();

        return view('pages.dashboard', compact('dataUser', 'dataCampaign'));
    }
}