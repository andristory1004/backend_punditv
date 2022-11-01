<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\CampaignCategory;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index () {
        $data = CampaignCategory::all();

        return response($data);
    }
}