<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu_warungs;
use Illuminate\Support\Facades\File;

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
        return view('seller_menu_input');
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
            'kategori' => $request->kategori,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $filename,
        ]);
      


         return redirect('seller/menu');
      
    }

    
    public function seller_menu_edit(int $id){

        $menu_warungs = menu_warungs::findOrFail($id);
        return view('seller_menu_edit', compact('menu_warungs'));

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
            'kategori' => $request->kategori,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $filename,]);


         return redirect('seller/menu');



    }
      

    public function destroy(int $id){
        {
            $menu_warungs = menu_warungs::findOrFail($id);
            if(File::exists($menu_warungs->gambar)){
                File::delete($menu_warungs->gambar);
            }
    
            $menu_warungs->delete();

        }

    }
}

