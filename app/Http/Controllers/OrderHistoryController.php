<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;

class OrderHistoryController extends Controller
{
    public function index(Request $request)
    {
        $user_role = Auth::user()->role;
        
        if ($user_role == 'seller') {
            $pemesanan = Pemesanan::where('seller_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        }
        else {
            $pemesanan = collect(); // empty collection if not seller
        }

        if ($request->has('status')) {
            $pemesanan->where('status_pemesanan', $request->status);
        }

        if ($request->has('from_date') && $request->has('to_date')) {
            $pemesanan->whereBetween('created_at', [$request->from_date, $request->to_date]);
        }


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