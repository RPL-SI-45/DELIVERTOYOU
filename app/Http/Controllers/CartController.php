<?php

namespace App\Http\Controllers;

use App\Models\menu_warungs;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $menu_item = menu_warungs::find($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // Kembalikan respon jika item sudah ada di keranjang
            return response()->json(['status' => 'exists']);
        } else {
            // Tambahkan item ke keranjang jika belum ada
            $cart[$id] = [
                "nama" => $menu_item->nama,
                "harga" => $menu_item->harga,
                "quantity" => 1,
                "gambar" => $menu_item->gambar
            ];

            session()->put('cart', $cart);
            return response()->json(['status' => 'added']);
        }
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function removeFromCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            session()->flash('success', 'Item has been removed from cart!');
        }

        return redirect()->route('cart.index');
    }
}
