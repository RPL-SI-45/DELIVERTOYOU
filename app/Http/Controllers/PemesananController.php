<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\PemesananItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::with('items.menu')->where('user_id', Auth::id())->get();
        return view('pemesanan.index', compact('pemesanan'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();
    
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('status', 'Keranjang Anda kosong.');
        }

        $firstCartItem = $cartItems->first();
        $sellerId = $firstCartItem->menu->seller_id;
    
        $pemesanan = Pemesanan::create([
            'user_id' => $user->id,
            'seller_id' => $sellerId,
            'nama_pelanggan' => $user->name,

        ]);
    
        foreach ($cartItems as $item) {
            PemesananItem::create([
                'pemesanan_id' => $pemesanan->id,
                'menu_id' => $item->menu_id,
                'harga' => $item->menu->harga,
                'quantity' => $item->quantity,
                'total_harga' => $item->menu->harga * $item->quantity,
            ]);
        }
    
        
    
        return redirect()->route('pemesanan.index')->with('status', 'Pemesanan berhasil dibuat.');
    }
    
    public function updateQuantity(Request $request, $id)
    {
        $item = PemesananItem::findOrFail($id);

        if ($request->action == 'increase') {
            $item->quantity += 1;
        } elseif ($request->action == 'decrease' && $item->quantity > 0) {
            $item->quantity -= 1;
        }

        $item->total_harga = $item->harga * $item->quantity;
        $item->save();

        return redirect()->back()->with('status', 'Quantity updated.');
    }

    public function destroyItem($id)
    {
        $item = PemesananItem::find($id);
        if ($item) {
            $item->delete();
        }
        return redirect()->route('pemesanan.index');
    }
}