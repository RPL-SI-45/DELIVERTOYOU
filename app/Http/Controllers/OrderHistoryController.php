<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

class OrderHistoryController extends Controller
{
    public function index(Request $request)
    {
        $user_role = Auth::user()->role;
        if($user_role == 'seller') {
            $query = Pemesanan::query();
            $order = $query->where('seller_id', Auth::user()->id)->get();
        }

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
        $pemesanan = $query->orderBy('created_at', 'desc')->get();
    }

    return view('riwayatpesanan.sellerriwayat', compact('pemesanan'));
    }


    // RIWAYAT CUSTOMER
    public function custhistory()
    {
        $user_role = Auth::user()->role;
        if($user_role == 'customer') {
            $pemesanan = Pemesanan::where('customer_id', $user->id)->orderBy('created_at', 'desc')->get();
        }
        return view('riwayatpesanan.customerriwayat', compact('pemesanan'));
    }

    public function historydetail($id)
    {
        $order = Pemesanan::findOrFail($id);
        return view('riwayatpesanan.customerdetail', compact('order'));
    }
}

