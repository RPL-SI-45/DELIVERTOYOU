<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu_warungs;
use App\Models\Kategori_admin;
use App\Models\User;

class CardController extends Controller
{
    public function menuwarung($id) {
        $Kategori_admin = Kategori_admin::pluck('jenis_kategori', 'id')->toArray();
        $menu_warungs = menu_warungs::where('seller_id', $id)->get();
        $nama_toko = User::where('id', $id)->get();
        
        return view('menuwarung', compact(['menu_warungs', 'Kategori_admin', 'nama_toko']));
    }

    public function halamanutama() {
        $Kategori_admin = Kategori_admin::pluck('jenis_kategori', 'id')->toArray();
        $menu_warungs = menu_warungs::all();
        
        return view('home', compact(['menu_warungs', 'Kategori_admin']));
    }

    public function filterAllByCategory(Request $request) {
        $Kategori_admin = Kategori_admin::pluck('jenis_kategori', 'id')->toArray();
        
        // // Ambil ID kategori yang dipilih
        $selectedCategoryId = $request->nama_kategori;
    
        // Filter menu_warungs berdasarkan kategori
        $menu_warungs = menu_warungs::where('kategori', $selectedCategoryId)->get();

        // // Debugging
        // dd($menu_warungs);
    
        return view('home', compact(['menu_warungs', 'Kategori_admin']));
        // return view('home', compact(['menu_warungs', 'Kategori_admin']));
    }

    public function filterByCategory(Request $request) {
        $Kategori_admin = Kategori_admin::pluck('jenis_kategori', 'id')->toArray();
        
        // Ambil ID kategori yang dipilih
        $selectedCategoryId = $request->nama_kategori;
    
        // Filter menu_warungs berdasarkan kategori
        $menu_warungs = menu_warungs::where('kategori', $selectedCategoryId)->get();

        // // Debugging
        // dd($menu_warungs);
    
        return view('menuwarung', compact(['menu_warungs', 'Kategori_admin']));
        // return view('home', compact(['menu_warungs', 'Kategori_admin']));
    }
    
}
