<?php

namespace App\Http\Controllers;
use App\Models\SellerDash;
use App\Models\menu_warungs;

use Illuminate\Http\Request;

class SellerDashController extends Controller
{
    public function index(Request $request)
    {
  
            $SellerDash = SellerDash::all();
            
            $menuwarung = menu_warungs::findOrFail($request->id);
            $count = count($menuwarung->id);
    
            $countEntry = new SellerDash();
            $countEntry->Total_pemesanan = $count;

            menu_warungs::create([
                'Total_pemesanan' => $request->$countEntry,
                ]
            );

        
        return view('Sellerdash', compact('SellerDash'));
    }

    
    

    public function store()
    {
        $menuwarung = menu_warungs::all();

        $count = count($menuwarung->id);
    }

}
