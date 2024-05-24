<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemesanan;

class FeedbackController extends Controller
{
    public function index(Request $request){

        $pemesanan = Pemesanan::findOrFail($request->id); 
        return view('feedback.feedback',compact(['pemesanan']));

    }

    public function store(Request $request){

        $pemesanan = Pemesanan::findOrFail($request->id); 

        $pemesanan->rating = $request->rating;
        $pemesanan->feedback = $request->feedback;
        $pemesanan->save();

        return redirect()->back();

    }
}

