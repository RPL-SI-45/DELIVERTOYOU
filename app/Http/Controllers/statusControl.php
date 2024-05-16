<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use Illuminate\Http\Request;

class statusControl extends Controller
{

    public function seller_status()
    {
        $pemesanan = pemesanan::all();
        return view('kelola_status.seller_status',compact(['pemesanan']));
    }

    public function order_status(Request $request)
    {
        $pemesanan = pemesanan::all();
        return view('kelola_status.cust_status',compact(['pemesanan']));
    }

    
    public function order_status_detail(Request $request)
    {
        $pemesanan = Pemesanan::findOrFail($request->id); 
        return view('kelola_status.cust_status_detail', compact('pemesanan'));
    }
    


    public function seller_status_detail($id)
    {
        $pemesanan = pemesanan::all();
        return view('kelola_status.seller_status_detail',compact(['pemesanan']));
    }

    public function up_to_cook(Request $request)
    {
    
        $id = $request->input('id');
        $diproses = $request->input('status_pemesanan');
        
        
        $diproses = 'Sedang Dimasak oleh Ahlinya';
        $update = pemesanan::where('id', $id)->update(['status_pemesanan' => $diproses]);
        

        if ($update) {
            return redirect('seller/{id}/status/detail/1');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui status acc_pemesanan.');
        }
    }
        
    public function seller_status_detail_1()
    {
        $pemesanan = pemesanan::all();
        return view('kelola_status.seller_status_detail_1',compact(['pemesanan']));

    }
    

    public function up_to_send(Request $request)
    {
        $id = $request->input('id');
        $diproses = $request->input('status_pemesanan');
        
  
        $diproses = 'Sedang diantar oleh driver professional';
        $update = pemesanan::where('id', $id)->update(['status_pemesanan' => $diproses]);
        
        if ($update) {
            return redirect('seller/{id}/status/detail/2');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui status pemesanan.');
        }
    }

    public function seller_status_detail_2()
    {
        $pemesanan = pemesanan::all();
        return view('kelola_status.seller_status_detail_2',compact(['pemesanan']));

    }

    public function done_status(Request $request)
    {
        $id = $request->input('id');
        $diproses = $request->input('status_pemesanan');
        
        $diproses = 'Pesanan Diterima dan selesai';
        $update = pemesanan::where('id', $id)->update(['status_pemesanan' => $diproses]);
        

        if ($update) {
            return redirect('seller/{id}/status/detail/3');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui status pemesanan.');
        }
    }

    public function seller_status_detail_3()
    {
        $pemesanan = pemesanan::all();

    }

}
