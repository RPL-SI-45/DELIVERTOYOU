<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu_warungs;

class SearchFilterMenu extends Controller
{
    public function index(Request $request)
    {
        $query = menu_warungs::query();

        // Search by name
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where('nama', 'LIKE', '%' . $searchTerm . '%');
        }

        $menu_warungs = $query->get();

        return view('menuwarung', compact('menu_warungs'));
    }
}
