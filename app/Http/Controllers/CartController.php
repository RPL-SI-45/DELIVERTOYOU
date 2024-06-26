<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\menu_warungs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $menu_item = menu_warungs::find($id);
    
        if (!$menu_item) {
            return response()->json(['status' => 'error', 'message' => 'Menu tidak ditemukan.']);
        }
    
        $user = Auth::user();
        $existingCartItem = Cart::where('user_id', $user->id)->where('menu_id', $id)->first();
    
        if ($existingCartItem) {
            return response()->json(['status' => 'exists', 'message' => 'Menu sudah ada di keranjang.']);
        }
    
        Cart::create([
            'user_id' => $user->id,
            'menu_id' => $id,
            'quantity' => 1,
        ]);
    
        return response()->json(['status' => 'added', 'message' => 'Berhasil Ditambahkan ke Keranjang.']);
    }

    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())
            ->where('status', 'active')
            ->with('menu')
            ->get();
        return view('cart.index', compact('cart'));
    }

    public function removeFromCart(Request $request, $id)
    {
        $cartItem = Cart::where('user_id', Auth::id())->where('id', $id)->first();

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->route('cart.index')->with('status', 'Item has been removed from cart!');
        }

        return redirect()->route('cart.index')->with('status', 'Item not found in cart!');
    }
}