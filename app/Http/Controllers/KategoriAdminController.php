<?php

namespace App\Http\Controllers;

use App\Models\Kategori_admin;
use Illuminate\Http\Request;

class KategoriAdminController extends Controller
{
    public function index()
    {
        $kategori_admin = Kategori_admin::all();
        session(['kategori_admin' => $kategori_admin]);
        return view('kategori_admin.index',compact(['kategori_admin']));
    }

    public function create()
    {
        return view('kategori_admin.create');
    }

    public function store(Request $request)
    {
        Kategori_admin::create($request->except(['submit']));
        return redirect('/kategori_admin');
    }

    public function edit($id)
    {
        $kategori_admin = Kategori_admin::find($id);
        return view('kategori_admin.edit',compact(['kategori_admin']));
    }

    public function update($id, Request $request)
    {
        $kategori_admin = Kategori_admin::find($id);
        $kategori_admin->update($request->except(['submit']));
        return redirect('/kategori_admin');
    }

    public function destroy($id)
    {
        $kategori_admin = Kategori_admin::find($id);
        $kategori_admin->delete();
        return redirect('/kategori_admin');
    }
}