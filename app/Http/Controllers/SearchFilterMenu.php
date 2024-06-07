<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu_warungs;
use App\Models\Kategori_admin;

class SearchFilterMenu extends Controller
{
    public function index(Request $request)
    {
        $query = menu_warungs::query();

        // Fetch all categories for the filter dropdown
        $Kategori_admin = Kategori_admin::pluck('jenis_kategori', 'id')->toArray();

        // Search by name
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where('nama', 'LIKE', '%' . $searchTerm . '%');
        }

        // Filter by category
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori', $request->kategori);
        }

        $menu_warungs = $query->get();
    

        return view('menuwarung', compact('menu_warungs', 'Kategori_admin'));
    }
}
