<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\PemesananItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\ItemComparison;

class PemesananController extends Controller
{
    use ItemComparison;

    public function index()
    {
        $pemesanan = Pemesanan::with('items.menu')
            ->where('user_id', Auth::id())
            ->where('status', '!=', 'completed')
            ->latest()
            ->get(); 
    
        $latestPemesanan = $pemesanan->first();
        $alamat = $latestPemesanan ? $latestPemesanan->alamat : '';
        return view('pemesanan.index', compact('pemesanan', 'alamat'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();
    
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('status', 'Keranjang Anda kosong.');
        }

        $latestPemesanan = Pemesanan::with('items')
            ->where('user_id', $user->id)
            ->where('status', '!=', 'completed')
            ->latest()
            ->first();

        if ($latestPemesanan && $this->areCartItemsSameAsPemesananItems($cartItems, $latestPemesanan->items)) {
            return redirect()->route('pemesanan.index')->with('status', 'Pemesanan sudah ada dengan item yang sama.');
        }
    
        $pemesanan = Pemesanan::create([
            'user_id' => $user->id,
            'nama_pelanggan' => $user->name,
        ]);
        
        $totalSemuaMenu = 0; // Inisialisasi total semua menu
    
        $pemesananItems = []; // Array untuk menyimpan item pemesanan sementara
    
        foreach ($cartItems as $item) {
            $totalHargaItem = $item->menu->harga * $item->quantity;
            $totalSemuaMenu += $totalHargaItem; // Tambahkan total harga item ke total semua menu

            $pemesananItems[] = PemesananItem::create([
                'pemesanan_id' => $pemesanan->id,
                'menu_id' => $item->menu_id,
                'harga' => $item->menu->harga,
                'quantity' => $item->quantity,
                'total_harga' => $totalHargaItem,
                'total_semua_menu' => 0, // Set sementara sebagai 0, akan diperbarui di bawah
            ]);
        }
    
        // Perbarui total semua menu untuk setiap item
        foreach ($pemesananItems as $pemesananItem) {
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

        // Perbarui total semua menu untuk setiap item dalam pesanan
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

        // Hitung ulang total semua menu setelah menghapus item
        if ($item) {
            $pemesanan = Pemesanan::findOrFail($item->pemesanan_id);
            $totalSemuaMenu = 0;
            foreach ($pemesanan->items as $pemesananItem) {
                $totalSemuaMenu += $pemesananItem->total_harga;
            }

            // Perbarui total semua menu untuk setiap item dalam pesanan
            foreach ($pemesanan->items as $pemesananItem) {
                $pemesananItem->total_semua_menu = $totalSemuaMenu;
                $pemesananItem->save();
            }
        }

        return redirect()->route('pemesanan.index');
    }

    public function completeOrder($id)
    {
        $user = Auth::user();
        $pemesanan = Pemesanan::where('user_id', $user->id)->where('id', $id)->first();

        if ($pemesanan) {
            $pemesanan->status = 'completed';
            $pemesanan->save();

            // Update status keranjang terkait menjadi completed
            Cart::where('user_id', $user->id)->where('status', 'active')->update(['status' => 'completed']);

            return redirect()->route('pemesanan.index')->with('status', 'Pemesanan telah selesai.');
        }

        return redirect()->route('pemesanan.index')->with('status', 'Pemesanan tidak ditemukan.');
    }

    public function submitAlamat(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $pemesanan = Pemesanan::where('user_id', $user->id)->latest()->first();

        if ($pemesanan) {
            $pemesanan->alamat = $request->alamat;
            $pemesanan->save();
        } else {
            return redirect()->back()->with('status', 'Tidak ada pemesanan yang ditemukan.');
        }

        return redirect()->back()->with('status', 'Alamat berhasil disimpan.');
    }
}
