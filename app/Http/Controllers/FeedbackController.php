<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemesanan;
use App\Models\SellerDash;

class FeedbackController extends Controller
{
    public function index(Request $request){

        $pemesanan = Pemesanan::findOrFail($request->id); 
        return view('feedback.feedback',compact(['pemesanan']));

    }

    public function store(Request $request){

        $pemesanan = Pemesanan::findOrFail($request->id); 
        $sellerDash = SellerDash::all();

        $pemesanan->rating = $request->rating;
        $pemesanan->feedback = $request->feedback;
        $pemesanan->save();


        
        $totalRatings = Pemesanan::where('status_pemesanan', 'Pesanan Diterima dan selesai')->sum('rating');
        $totalOrders = session('totalOrders');
        
        if ($totalOrders > 0) {
            $averageRating = $totalRatings / $totalOrders;
        } else {
            $averageRating = $totalRatings; 
        }
        
        // Misalkan Anda mencari sellerDash dengan ID tertentu, sesuaikan sesuai kebutuhan Anda
        $sellerDash = SellerDash::first(); 
        
        if ($sellerDash) {
            $sellerDash->total_rating = $averageRating;
            $sellerDash->save();
        } else {
            SellerDash::create([
                'total_rating' => $averageRating,
            ]);
        }
        
        return redirect('order/status');
        

    }
}

