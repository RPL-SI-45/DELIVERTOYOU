<?php

namespace App\Http\Controllers;
use App\Models\SellerDash;
use App\Models\SellerDash1;
use App\Models\SellerDash2;

use Illuminate\Http\Request;
use Carbon\Carbon;

class SellerDashController extends Controller
{
    public function index(Request $request)
    {
     
        $SellerDash = SellerDash::all();

        return view('Sellerdash.Sellerdash', compact('SellerDash'));
    }


    public function Month(Request $request)
    {
        $SellerDash1 = SellerDash1::all();
    
        return view('Sellerdash.Sellerdash1', compact('SellerDash1'));
    }
    
    

    public function Month1(Request $request)
    {
     
        $SellerDash2 = SellerDash2::all();

        return view('Sellerdash.Sellerdash3');
        
    }

}



