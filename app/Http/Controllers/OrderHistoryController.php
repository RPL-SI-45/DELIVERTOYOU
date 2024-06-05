<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;
use App\Models\PemesananItem;

class OrderHistoryController extends Controller
{
    public function index(Request $request)
    {
        $user_role = Auth::user()->role;
        $query = Pemesanan::query()->with(['items.menu']);

        if ($user_role == 'seller') {
            $query->where('seller_id', Auth::user()->id);
        }

        // Filter berdasarkan status pesanan
        if ($request->has('status')) {
            $query->where('status_pemesanan', $request->status);
        }

        // Filter berdasarkan rentang tanggal
        if ($request->has('from_date') && $request->has('to_date')) {
            $query->whereBetween('created_at', [$request->from_date, $request->to_date]);
        }

        // Ambil semua data pesanan yang sudah difilter dan diurutkan berdasarkan tanggal
        $pemesanan = $query->orderBy('created_at', 'desc')->get();

        return view('riwayatpesanan.sellerriwayat', compact('pemesanan'));
    }

    public function custhistory()
    {
        $user_role = Auth::user()->role;
        if ($user_role == 'customer') {
            $pemesanan = Pemesanan::where('user_id', Auth::user()->id)
                                  ->orderBy('created_at', 'desc')
                                  ->get();
        } else {
            $pemesanan = collect(); // empty collection if not customer
        }

        return view('riwayatpesanan.customerriwayat', compact('pemesanan'));
    }

    public function historydetail($id)
    {
        $order = Pemesanan::with(['items.menu'])->findOrFail($id);
        return view('riwayatpesanan.customerdetail', compact('order'));
    }
}