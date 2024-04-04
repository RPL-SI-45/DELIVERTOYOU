<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu_warung;

class menuControl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu_warung = menu_warung::all();
        return view('seller_menu',compact(['menu_warung']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function seller_menu_input()
    {
        return view('/seller_menu_input');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        menu_warung::create($request->except(['_token']));
        return redirect('seller/menu');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
