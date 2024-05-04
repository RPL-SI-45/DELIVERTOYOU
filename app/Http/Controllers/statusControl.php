<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use Illuminate\Http\Request;

class statusControl extends Controller
{

    public function seller_status()
    {
        $pemesanan = pemesanan::where('status_pemesanan', 'Sudah dikonfirmasi')->get();
        return view('kelola_status.seller_status',compact(['pemesanan']));
    }


    public function seller_status_detail()
    {
        $pemesanan = pemesanan::all();
        return view('kelola_status.seller_status_detail',compact(['pemesanan']));
    }

    public function up_to_cook(Request $request)
    {
    
        $id = $request->input('id');
        $diproses = $request->input('status_pemesanan');
        
        
        $diproses = 'Sedang Dimasak oleh Ahlinya';
        $update = acc_pemesanan::where('id', $id)->update(['status_pemesanan' => $diproses]);
        

        if ($update) {
            return redirect('kelola_status.seller/{id}/status/detail/1');
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
            return redirect('kelola_status.seller/{id}/status/detail/2');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui status pemesanan.');
        }
    }

    public function seller_status_detail_2()
    {
        $pemesanan = _pemesanan::all();
        return view('kelola_status.seller_status_detail_2',compact(['acc_pemesanan']));

    }

    public function done_status(Request $request)
    {
        $id = $request->input('id');
        $diproses = $request->input('status_pemesanan');
        
        $diproses = 'Pesanan Diterima dan selesai';
        $update = pemesanan::where('id', $id)->update(['status_pemesanan' => $diproses]);
        

        if ($update) {
            return redirect('kelola_status.seller/{id}/status/detail/3');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui status acc_pemesanan.');
        }
    }

    public function seller_status_detail_3()
    {
        $pemesanan = pemesanan::all();

    }

    public function update(Request $request, status_pesan $status_pesan)
    {
        
    }

    public function destroy(status_pesan $status_pesan)
    {
        
    }
}
