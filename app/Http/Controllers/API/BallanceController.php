<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\CreditPoint;
use App\Models\CreditPundi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BallanceController extends Controller
{
    public function point ()
    {
        $id = auth('sanctum')->user()->id;

        $dataUser = User::find($id);
        $data = $dataUser->creditPoint()->get();

        return response()->json($data);
    }

    public function pundi ()
    {
        $id = auth('sanctum')->user()->id;
        
        $dataUser = User::find($id);
        $data = $dataUser->creditPundi()->get();

        return response()->json($data);
    }
}