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
            'bukti' =>  'nullable|mimes:png,jpg,jpeg,webp',
        ]);

        $pemesanan = Pemesanan::findOrFail($pemesananId);
        $total_bayar = $pemesanan->total_harga;
        
        if ($request->metode == 'QRIS') {
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
        }
        }
}