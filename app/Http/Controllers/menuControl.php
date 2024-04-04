<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu_warungs;

class menuControl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function seller_menu()
    {
        $menu_warung = menu_warungs::all();
        return view('seller_menu',compact(['menu_warung']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function seller_menu_input()
    {
        return view('seller_menu_input');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
    
        menu_warungs::create($request->except(['_token']));
      
         if($request->hasfile('gambar')){
            $request->file('gambar')->move('gambar_menu/', $request->file('gambar')->getClientOriginalName());
            $menu_warung->gambar = $request->file('gambar')->getClientOriginalName();
            $menu_warungs->save();


         return redirect('seller/menu');

         }

        

        
        
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
