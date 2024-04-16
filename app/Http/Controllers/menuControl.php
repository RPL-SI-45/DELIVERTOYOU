<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu_warungs;
use App\Models\Kategori_admin;
use Illuminate\Support\Facades\File;
use Form;

class menuControl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function seller_menu()
    {
        $menu_warungs = menu_warungs::all();
        return view('seller_menu',compact(['menu_warungs']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function seller_menu_input()
    {

        $Kategori_admin = Kategori_admin::pluck('jenis_kategori')->toArray(); // Ubah nama_kolom dan id sesuai kebutuhan
        return view('seller_menu_input')->with('jenis_kategori', $Kategori_admin);

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
    
        $request->validate([
            'gambar' => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);

        if ($request->has('gambar')){

            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
    
            $filename = time().'.'.$extension;
    
            $path = 'gambar_menu/';
            $file->move($path, $filename);
        }

        menu_warungs::create([
            'kategori' => $request->nama_kategori,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $filename,
        ]);
        

         return redirect('seller/menu');
      
    }

    
    public function seller_menu_edit(int $id){

        $menu_warungs = menu_warungs::findOrFail($id);
        $kategori = kategori::pluck('kategori')->toArray(); // Ubah nama_kolom dan id sesuai kebutuhan

        return view('seller_menu_edit', compact('menu_warungs'))->with('kategori', $kategori);;

    }

    
    public function update($id, Request $request){
        $request->validate([
            'gambar' => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);

        $menu_warungs = menu_warungs::findOrFail($id);

        if($request->has('gambar')){

            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'gambar_menu/';
            $file->move($path, $filename);

            if(File::exists($menu_warungs->gambar)){
                File::delete($menu_warungs->gambar);
            }
        }

        $menu_warungs->update([
            'kategori' => $request->nama_kategori,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $filename,]);


         return redirect('seller/menu');



    }

    public function destroy(int $id){
        
        $menu_warungs = menu_warungs::findOrFail($id);
            if(File::exists($menu_warungs->gambar)){
                File::delete($menu_warungs->gambar);
            }
    
        $menu_warungs->delete();

         return redirect('seller/menu');


        

    }
}

