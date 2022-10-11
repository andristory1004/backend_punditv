<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SubscribeProgress;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SubscribeProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth('sanctum')->user()->id;
        $dataCampaign = User::find($id);
        $data = $dataCampaign->subscribeProgress()->get();
        
        return response()->json([
            'message' => 'Success',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'progress' => ""
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
     
        $update = SubscribeProgress::where('id', $id)->update([
            'progress' => $request->progress
        ]);

        $idUser = auth('sanctum')->user()->id;
        $dataProgress = User::find($idUser);
        $data = $dataProgress->subscribeProgress()->get();

        return response()->json([
            'Message' => "Success",
            'Id' => $idUser,
            'Data'  => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}