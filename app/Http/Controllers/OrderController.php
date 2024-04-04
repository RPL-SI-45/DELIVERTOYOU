<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

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

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        $order->status = $request->status;
        $order->save();

        return redirect()->route('pesananmasuk.index')->with('success', 'Order status updated successfully.');
    } 

}
