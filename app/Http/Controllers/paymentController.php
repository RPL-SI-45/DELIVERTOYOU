<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use Illuminate\Http\Request;

class paymentController extends Controller
{
    public function index()
    {
        $payment = Payment::all();
        return view('payment.customerpayment', compact(['payment']));
    }
    public function store(Request $request){
    
        // Validasi request
        $request->validate([
            'metode' => 'required', 
            'total_bayar' => 'required|numeric', 
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        // Simpan bukti pembayaran
        $proofOfPaymentPath = $request->file('bukti')->store('proof_of_payments'); 

        // Simpan data pembayaran ke database
        Payment::create([
            'metode' => $request->metode, 
            'total_bayar' => $request->total_bayar, 
            'bukti' => $proofOfPaymentPath, 
        ]);

        return redirect()->back()->with('success', 'Pembayaran berhasil disimpan.');
    }
}