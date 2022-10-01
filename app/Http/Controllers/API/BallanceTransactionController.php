<?php

namespace App\Http\Controllers\API;

use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Models\BallanceTransaction;
use App\Http\Controllers\Controller;

class BallanceTransactionController extends Controller
{
    public function index () 
    {
        $data = BallanceTransaction::all();

        return response()->json([
            'message'   => 'Success showing data..!',
            'data'      => $data
        ]);
    }

    public function store (Request $request)
    {
        $validasi = $request->validate([
            'user_id' => '',
            'campaign_id' => 'required',
            'ballance_id' => 'required',
            'prefix' => 'required',
            'description' => '',
            'transaction_status_id' => 'required',
        ]);

        $validasi['user_id'] = auth('sanctum')->user()->id;

        $data = BallanceTransaction::create($validasi);

        return response()->json(
            [
                'message' => " Data success saved..!",
                'data' => $data
            ]
        );
    }
}