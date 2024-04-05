<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use Illuminate\Http\Request;

class statusControl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function seller_status()
    {
        $pemesanan = pemesanan::all();
        return view('seller_status',compact(['pemesanan']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function seller_status_detail()
    {
        $pemesanan = pemesanan::all();
        return view('seller_status_detail',compact(['pemesanan']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function up_to_cook(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function up_to_send(status_pesan $status_pesan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function done(status_pesan $status_pesan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, status_pesan $status_pesan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(status_pesan $status_pesan)
    {
        //
    }
}
