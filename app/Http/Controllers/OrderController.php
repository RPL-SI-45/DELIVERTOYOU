<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Pemesanan;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('pesananmasuk.index', compact('orders')); 
    }

    public function show(Order $order)
    {
        return view('pesananmasuk.show', compact('order'));
    }

}