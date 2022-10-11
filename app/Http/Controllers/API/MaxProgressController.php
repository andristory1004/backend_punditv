<?php

namespace App\Http\Controllers\API;

use App\Models\MaxProgress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaxProgressController extends Controller
{
    public function index()
    {
        $data = MaxProgress::all();

        return response()->json([
            'Message'   => "Success",
            'Data'      => $data
        ]);
    }
}