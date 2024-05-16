<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    public function index()
    {
        // Mendapatkan semua pemesanan dengan status 'Selesai'
        $orders = Pemesanan::where('status_pemesanan', 'Pesanan Diterima dan selesai')->get();
        return view('riwayatpesanan.sellerriwayat', compact('orders'));
    }
}
