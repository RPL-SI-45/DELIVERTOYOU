<?php

namespace App\Http\Controllers;

use App\Models\Kategori_admin;
use Illuminate\Http\Request;

class KategoriAdminController extends Controller
{
    public function index(){
        $kategori_admin = Kategori_admin::all();
        return view('kategori_admin.index',compact(['kategori_admin']));
    }
}
