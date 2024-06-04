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
    
        $totalSemuaMenu = 0; // Inisialisasi total semua menu
    
        foreach ($cartItems as $item) {
            $totalHargaItem = $item->menu->harga * $item->quantity;
            $pemesananItem = PemesananItem::create([
                'pemesanan_id' => $pemesanan->id,
                'menu_id' => $item->menu_id,
                'harga' => $item->menu->harga,
                'quantity' => $item->quantity,
                'total_harga' => $totalHargaItem,
            ]);
    
            $totalSemuaMenu += $totalHargaItem; // Tambahkan total harga item ke total semua menu
        }
    
        // Perbarui total semua menu dalam setiap pemesanan item
        foreach ($pemesanan->items as $pemesananItem) {
            $pemesananItem->total_semua_menu = $totalSemuaMenu;
            $pemesananItem->save();
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
    
        // Hitung ulang total harga item
        $item->total_harga = $item->harga * $item->quantity;
        $item->save();
    
        // Hitung ulang total semua menu dalam satu pesanan
        $pemesanan = Pemesanan::findOrFail($item->pemesanan_id);
        $totalSemuaMenu = 0;
        foreach ($pemesanan->items as $pemesananItem) {
            $totalSemuaMenu += $pemesananItem->total_harga;
        }
    
        // Perbarui total semua menu dalam setiap pemesanan item
        foreach ($pemesanan->items as $pemesananItem) {
            $pemesananItem->total_semua_menu = $totalSemuaMenu;
            $pemesananItem->save();
        }
    
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