<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu_warungs;
use App\Models\Kategori_admin;
use Illuminate\Support\Facades\File;
use Form;
use Illuminate\Support\Facades\Auth;

class menuControl extends Controller
{

    public function seller_menu()
    {
        $menu_warungs = menu_warungs::all();
        return view('menu_input_penjual.seller_menu', compact('menu_warungs'));
    }


    public function seller_menu_input()
    {

        $Kategori_admin = Kategori_admin::pluck('jenis_kategori')->toArray(); 
        return view('menu_input_penjual.seller_menu_input')->with('Kategori_admin', $Kategori_admin);

        
    }


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
            'seller_id' => Auth::id(),
        ]);
        

         return redirect('seller/menu');
      
    }

    
    public function seller_menu_edit(int $id){

        $menu_warungs = menu_warungs::findOrFail($id);
        $Kategori_admin = Kategori_admin::pluck('jenis_kategori')->toArray();

        return view('menu_input_penjual.seller_menu_edit', compact('menu_warungs'))->with('Kategori_admin', $Kategori_admin);

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


         return redirect('menu_input_pejual.seller/menu');



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

