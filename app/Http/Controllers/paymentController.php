<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class paymentController extends Controller
{
    public function index($pemesananId)
    {
        $pemesanan = Pemesanan::findOrFail($pemesananId);
        $payment = Payment::where('pemesanan_id', $pemesananId)->first();
        return view('payment.customerpayment', compact(['payment', 'pemesanan', 'pemesananId']));
    }

    public function store(Request $request, $pemesananId){
    
        // Validasi request
        $request->validate([
            'metode' => 'required',
        ]);

        $pemesanan = Pemesanan::findOrFail($pemesananId);
        $total_bayar = $pemesanan->total_harga;

        if ($request->metode === 'QRIS') {
            return redirect()->route('customer.qris', $pemesananId);
        }

        /*if ($request->metode == 'QRIS') {
            if ($request->has('bukti')) {
                $file = $request->file('bukti');
                $extension = $file->getClientOriginalExtension();
    
                $filename = time().'.'.$extension;
    
                $path = 'bukti/bayar/';
                $file->move($path, $filename);

        // Simpan bukti pembayaran
        //$proofOfPaymentPath = $request->file('bukti')->store('proof_of_payments'); 

        // Simpan data pembayaran ke database
            Payment::create([
                'pemesanan_id' => $pemesananId,
                'metode' => $request->metode, 
                'total_bayar' => $total_bayar,
                'bukti' => $filename, 
                ]);

            return redirect()->back()->with('success', 'Pembayaran berhasil disimpan.');
            }
        } else {

            // Simpan data pembayaran ke database
            Payment::create([
                'pemesanan_id' => $pemesananId,
                'metode' => $request->metode,
                'total_bayar' => $total_bayar,
            ]);
    
            return redirect()->back()->with('success', 'Pembayaran berhasil disimpan.');
        }*/
        Payment::create([
            'pemesanan_id' => $pemesananId,
            'metode' => $request->metode,
            'total_bayar' => $total_bayar,
        ]);
    
        return redirect("/payment/{$pemesananId}");
    }

    public function storeqris(Request $request, $pemesananId)
    {
        // Validasi request
        $request->validate([
            'bukti' =>  'required|mimes:png,jpg,jpeg,webp',
        ]);

        $pemesanan = Pemesanan::findOrFail($pemesananId);
        $total_bayar = $pemesanan->total_harga;

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

        return view('payment.customerqris', compact('pemesanan'));
    }
}