<?php

namespace App\Http\Controllers;
use App\Models\Kategori_admin;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
        if(auth()->check()) {
            if(auth()->user()->role == 'customer') {
                return view('home')->with('nama', auth()->user()->name);
            } elseif(auth()->user()->role == 'seller') {
                return view('home_seller')->with('nama', 'Seller');
            } else {
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }
    }
}




