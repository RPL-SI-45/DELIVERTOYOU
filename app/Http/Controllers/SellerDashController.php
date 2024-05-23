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

        return view('Sellerdash.Sellerdash', compact('SellerDash'));


        
    }

    
    

    public function store()
    {
        $menuwarung = menu_warungs::all();

        $count = count($menuwarung->id);
    }

}
