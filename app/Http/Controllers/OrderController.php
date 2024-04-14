<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Pemesanan;

class OrderController extends Controller
{
    public function sellerOrder()
    {
        $pemesanan = Pemesanan::all();
        $payment = Payment::all();
    
        return view('pesananmasuk.sellerorder', compact('pemesanan', 'payment'));
    }
    public function sellerDetail($id)
    {
        $pemesanan = Pemesanan::find($id);
        return view('pesananmasuk.sellerdetail', compact('pemesanan'));
    }

}