<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function sellerOrder()
    {
        $role = Auth::user()->role;

        if ($role == 'seller') {
            $pemesanan = Pemesanan::where('seller_id', Auth::user()->id)
                                    ->where('status_pemesanan', 'Menunggu konfirmasi')
                                    ->with('items.menu') // Ensure related items and menu are loaded
                                    ->get();
        } else {
            $pemesanan = collect(); // empty collection if not seller
        }

        // Mengambil data pembayaran
        $payment = Payment::all();

        return view('pesananmasuk.sellerorder', compact('pemesanan', 'payment'));
    }
    

    public function sellerDetail($id)
    {
        // Mengambil detail pemesanan berdasarkan ID
        $pemesanan = Pemesanan::with('items.menu')->findOrFail($id);

        return view('pesananmasuk.sellerdetail', compact('pemesanan'));
    }

    public function update(Request $request, $id)
    {
        // Melakukan update status pesanan
        $order = Pemesanan::findOrFail($id);
        $order->status_pemesanan = 'Sedang berlangsung';
        $order->save();

        return redirect()->route('seller.order')->with('berhasil', 'Order dikonfirmasi');
    }

    public function acc_konfirmasi(Request $request)
    {
        $id = $request->input('id');
        $diproses = $request->input('status_pemesanan');
        

        $diproses = 'Sudah dikonfirmasi';
        $update = pemesanan::where('id', $id)->update(['status_pemesanan' => $diproses]);
        
        if ($update) {
            return redirect('/seller/status');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui status pemesanan.');


         }
    }

    public function reject($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $pemesanan->status_pemesanan = 'Pesanan Ditolak';
        $pemesanan->save();

        return redirect()->route('seller.order')->with('status', 'Pesanan ditolak');
    }
}
