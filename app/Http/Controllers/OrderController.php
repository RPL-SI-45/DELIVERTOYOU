<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\PemesananItem;
use App\Models\Payment;
use App\Models\PesananMasuk;
use App\Models\MenuWarung;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function sellerOrder()
    {
        $role = Auth::user()->role;

        if ($role == 'seller') {
            $pemesanan = Pemesanan::where('seller_id', Auth::user()->id)->where('status_pemesanan', 'Menunggu konfirmasi')->get();
        } else {
            $pemesanan = collect(); // empty collection if not seller
        }

        // Get all orders with related pemesanan items and menu
        $pemesanan = Pemesanan::with(['items.menu'])->get()->groupBy('id');
        
        return view('pesananmasuk.sellerorder', compact('pemesanan'));
    }

    public function sellerDetail($id)
    {
        // Get the order with related pemesanan items and menu
        $pemesanan = Pemesanan::with(['items.menu', 'payment'])->findOrFail($id); 
        
        return view('pesananmasuk.sellerdetail', compact('pemesanan')); 
    }

    public function update(Request $request, $id)
    {
        // Update order status
        $order = Pemesanan::findOrFail($id);
        $order->status_pemesanan = 'sedang berlangsung';
        $order->save();

        return redirect()->route('seller.order')->with('berhasil', 'Order dikonfirmasi');
    }
    
    public function acc_konfirmasi(Request $request, $id)
    {
        $acc = 'Sudah dikonfirmasi';
        
        Pemesanan::where('id', $id)->update(['status_pemesanan' => $acc]);

        return redirect('seller/status');
    }

    public function reject($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $pemesanan->status_pemesanan = 'Pesanan Ditolak';
        $pemesanan->save();
        
        return  redirect()->route('seller.order')->with('status', 'Pesanan ditolak');
    }
}