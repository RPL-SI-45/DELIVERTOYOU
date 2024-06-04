<?php

namespace App\Http\Controllers;
use App\Models\SellerDash;
use App\Models\SellerDash1;
use App\Models\SellerDash2;
use App\Models\User;

use Illuminate\Http\Request;
use Carbon\Carbon;

class SellerDashController extends Controller
{
    public function index(Request $request)
    {
     
        $SellerDash = SellerDash::all();

        return view('Sellerdash.Sellerdash', compact('SellerDash'));
    }

    

    public function Month1(Request $request)
    {
     
        $SellerDash2 = SellerDash2::all();

        return view('Sellerdash.Sellerdash3', compact('SellerDash2'));
        
    }

    public function EditProfileToko($id)
    {
        $user = User::find($id);
        return view('SellerProfile',compact(['user']));
    }
    
    public function UpdateProfileToko($id, Request $request)
    {
     
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,
            'nama_toko' => $request->nama_toko,
            'alamat_toko' => $request->alamat_toko,
        ]

        );

        return redirect('/seller/dash');
        
    }

}



