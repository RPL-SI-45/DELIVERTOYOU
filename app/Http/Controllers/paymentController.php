<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($pemesananId)
    {
        $pemesanan = Pemesanan::findOrFail($pemesananId);
        $payment = Payment::where('pemesanan_id', $pemesananId)->first();
        return view('payment.customerpayment', compact('pemesanan'));
    }

    public function store(Request $request, $pemesananId)
    {
        $pemesanan = Pemesanan::findOrFail($pemesananId);
        $total_bayar = $pemesanan->total_harga;

        if ($request->metode === 'qris') {
            return redirect()->route('payment.qris', ['pemesananId' => $pemesananId]);
        } else {
            return redirect()->route('customer.status', ['pemesananId' => $pemesananId]);
        }
    }

    public function showQrisForm($pemesananId)
    {
        $pemesanan = Pemesanan::findOrFail($pemesananId);
        return view('payment.customerqris', compact('pemesanan'));
    }

    public function storeQris(Request $request, $pemesananId)
    {
        // Validasi request
        $request->validate([
            'bukti' =>  'required|mimes:png,jpg,jpeg,webp',
        ]);

        $pemesanan = Pemesanan::findOrFail($pemesananId);
        $total_bayar = $pemesanan->total_harga;

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

        // Redirect ke halaman konfirmasi pembayaran diterima
        return redirect()->route('customer.status', $pemesananId);

    }
    public function showStatus($pemesananId)
    {
        $pemesanan = Pemesanan::findOrFail($pemesananId);
        return view('payment.customerstatus', compact('pemesanan'));
    
    }
}