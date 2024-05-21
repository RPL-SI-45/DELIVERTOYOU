<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Payment;
use App\Models\PesananMasuk;

class OrderController extends Controller
{
    public function sellerOrder()
    {

        $pemesanan = Pemesanan::all();
        return view('pesananmasuk.sellerorder', compact('pemesanan'));
       
        
        // Mengambil data pembayaran
        $payment = Payment::all();
        
        return view('pesananmasuk.sellerorder', compact('pemesanan', 'payment'));
    }

    public function sellerDetail($id)
    {
        // Mengambil detail pemesanan berdasarkan ID
        $pemesanan = Pemesanan::findOrFail($id); 
        
        return view('pesananmasuk.sellerdetail', compact('pemesanan')); 
    }

    public function update(Request $request, $id)
    {
        // Melakukan update status pesanan
        $order = Pemesanan::findOrFail($id);
        $order->status = 'sedang berlangsung';
        $order->save();

        return redirect()->route('seller.order')->with('berhasil', 'Order dikonfirmasi');
    }


    public function acc_konfirmasi(Request $request)
    {
        $id = $request->input('id');
        $acc = $request->input('status_pemesanan');
        
        $acc = 'Sudah dikonfirmasi';
        $update = pemesanan::where('id', $request->id)->update(['status_pemesanan' => $acc]);

        return redirect('/seller/status');
    }

    public function reject($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $pemesanan->status_pemesanan = 'Pesanan Ditolak';
        $pemesanan->save();

        return redirect()->route('seller.order')->with('status', 'Pesanan ditolak');
    }
}