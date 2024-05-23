<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // Ambil data keranjang dari session atau database
        $cart = session()->get('cart', []);

        // Tampilkan view dengan data keranjang
        return view('cart.index', compact('cart'));
    }
}
