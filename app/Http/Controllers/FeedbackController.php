<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemesanan;

class FeedbackController extends Controller
{
    public function index(){

        $pemesanan = pemesanan::all();
        return view('feedback.feedback');

    }
}
