<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\PemesananItem;
use App\Models\Payment;
use App\Models\PesananMasuk;
use App\Models\MenuWarung;

class OrderController extends Controller
{
    public function sellerOrder()
    {
        // Get all orders with related pemesanan items and menu
        $pemesanan = Pemesanan::with(['items.menu'])->get();
        
        return view('pesananmasuk.sellerorder', compact('pemesanan'));
    }

    public function sellerDetail($id)
    {
        // Get the order with related pemesanan items and menu
        $pemesanan = Pemesanan::with(['items.menu'])->findOrFail($id); 
        
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
    
    public function acc_konfirmasi(Request $request)
    {
        $id = $request->input('id');
        $acc = 'Sudah dikonfirmasi';
        
        Pemesanan::where('id', $id)->update(['status_pemesanan' => $acc]);

        //return redirect()->route('seller/status')->with('berhasil', 'Order telah dikonfirmasi');
        return redirect('seller/status');
    }

    public function reject($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $pemesanan->status_pemesanan = 'Pesanan Ditolak';
        $pemesanan->save();
        
        return redirect()->route('seller.order')->with('status', 'Pesanan ditolak');
    }
}
