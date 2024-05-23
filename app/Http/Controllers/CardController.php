<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu_warungs;

class CardController extends Controller
{
    public function menuwarung() {
        $menu_warungs = menu_warungs::all();
        return view('menuwarung',compact(['menu_warungs']));
    }

    public function halamanutama() {
        $menu_warungs = menu_warungs::all();
        return view('/home',compact(['menu_warungs']));
    }
}
