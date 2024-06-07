<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PemesananItem;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PaymentController extends Controller
{
    public function index($pemesananId)
    {
        $pemesanan = Pemesanan::findOrFail($pemesananId);
        $pemesananItem = $pemesanan->items->first();
        return view('payment.customerpayment', compact('pemesanan', 'pemesananItem'));
    }    

    public function store(Request $request, $pemesananId)
    {
        $pemesanan = Pemesanan::findOrFail($pemesananId);
        $pemesananItem = PemesananItem::where('pemesanan_id', $pemesananId)->first();

        if (!$pemesananItem) {
            return redirect()->back()->withErrors(['error' => 'Pemesanan Item not found']);
        }

        $total_bayar = $pemesananItem->total_semua_menu;

        if (is_null($total_bayar)) {
            return redirect()->back()->withErrors(['error' => 'Total bayar cannot be null']);
        }

        if ($request->metode === 'qris') {
            return redirect()->route('payment.qris', ['pemesananId' => $pemesananId]);
        } else {
            Payment::create([
                'pemesanan_id' => $pemesananId,
                'metode' => 'Tunai',
                'total_bayar' => $total_bayar,
            ]);

            // Update status pemesanan menjadi completed
            $pemesanan->status = 'completed';
            $pemesanan->save();

            return redirect()->route('order.status', ['pemesananId' => $pemesananId]);
        }
    }

    public function showQrisForm($pemesananId)
    {
        $pemesanan = Pemesanan::findOrFail($pemesananId);
        $qris = User::where('id', $pemesanan->seller_id)->get();
        return view('payment.customerqris', compact('pemesanan','qris'));
    }

    public function storeQris(Request $request, $pemesananId)
    {
        // Validasi request
        $request->validate([
            'bukti' =>  'required|mimes:png,jpg,jpeg,webp',
        ]);

        $pemesanan = Pemesanan::findOrFail($pemesananId);
        $pemesananItem = PemesananItem::where('pemesanan_id', $pemesananId)->first();

        if (!$pemesananItem) {
            return redirect()->back()->withErrors(['error' => 'Pemesanan Item not found']);
        }

        $total_bayar = $pemesananItem->total_semua_menu;

        if (is_null($total_bayar)) {
            return redirect()->back()->withErrors(['error' => 'Total bayar cannot be null']);
        }

        // Proses penyimpanan bukti pembayaran QRIS
        $file = $request->file('bukti');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $path = 'bukti/bayar/';
        $file->move($path, $filename);

        // Simpan data pembayaran ke database
        Payment::create([
            'pemesanan_id' => $pemesananId,
            'metode' => 'QRIS',
            'total_bayar' => $total_bayar,
            'bukti' => $filename,
        ]);

        // Update status pemesanan menjadi completed
        $pemesanan->status = 'completed';
        $pemesanan->save();

        // Redirect ke halaman konfirmasi pembayaran diterima
        return redirect()->route('order.status', ['pemesananId' => $pemesananId]);
    }

    public function showStatus($pemesananId)
    {
        $pemesanan = Pemesanan::findOrFail($pemesananId);
        return view('order.status', compact('pemesanan'));
    }

    public function completePayment(Request $request, $pemesananId)
    {
        // Logika untuk memproses pembayaran
        $paymentSuccessful = true; // Contoh, sesuaikan dengan logika sebenarnya

        if ($paymentSuccessful) {
            $pemesanan = Pemesanan::find($pemesananId);
            $pemesanan->status = 'completed';
            $pemesanan->save();
            
            return redirect()->route('payment.index', ['pemesananId' => $pemesananId])->with('success', 'Pembayaran berhasil dan status pemesanan sudah diperbarui.');
        }

        return redirect()->route('pemesanan.index')->with('error', 'Pembayaran gagal.');
    }
}
