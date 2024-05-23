<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

class OrderHistoryController extends Controller
{
    public function index(Request $request)
    {
    $query = Pemesanan::query();

    // Filter berdasarkan status pesanan
    if ($request->has('status')) {
        $query->where('status_pemesanan', $request->status);
    }

    // Filter berdasarkan rentang tanggal
    if ($request->has('from_date') && $request->has('to_date')) {
        $query->whereBetween('created_at', [$request->from_date, $request->to_date]);
    }

    // Jika tidak ada parameter filter yang diterima, tampilkan semua data pesanan
    if (!$request->has('status') && (!$request->has('from_date') || !$request->has('to_date'))) {
        $pemesanan = Pemesanan::orderBy('created_at', 'desc')->get();
    } else {
        // Ambil data pesanan berdasarkan filter yang diterapkan
        $pemesanan = $query->orderBy('created_at', 'desc')->get();
    }

    return view('riwayatpesanan.sellerriwayat', compact('pemesanan'));
    }
    
    public function custhistory()
    {
        $customerEmail = auth()->user()->email;
        $orders = Pemesanan::where('email', $customerEmail)->get();
        
        return view('riwayatpesanan.customerriwayat', compact('orders'));
    }

    public function historydetail($id)
    {
        $order = Pemesanan::findOrFail($id);

        return view('riwayatpesanan.customerdetail', compact('order'));
    }
}