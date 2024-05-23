<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

class FeedbackController extends Controller
{
    public function index(){

        $Pemesanan = Pemesanan::all();
        return view('feedback.feedback');

    }
}
