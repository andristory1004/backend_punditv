<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CampaignPriceList;
use App\Http\Controllers\Controller;

class CampaignPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = CampaignPriceList::find($id);

        return view('pages.price.edit_campaign_price', compact('data'));
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
        $validasi = $request->validate([
            'price' => "",
            'sale' => "",
            'is_active' => ""
        ]);
        
        CampaignPriceList::where('id', $id)->update([
            'price' => $request->price,
            'sale' => $request->sale,
            'is_active' => $request->is_active,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('price')->with([
            'success' => 'data saved successfully'
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