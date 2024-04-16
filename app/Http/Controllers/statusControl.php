<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use Illuminate\Http\Request;

class statusControl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function seller_status()
    {
        $pemesanan = pemesanan::all();
        return view('seller_status',compact(['pemesanan']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function seller_status_detail()
    {
        $pemesanan = pemesanan::all();
        return view('seller_status_detail',compact(['pemesanan']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function up_to_cook(Request $request)
    {
    
        $id = $request->input('id');
        $diproses = $request->input('status_pemesanan');
        
        // Lakukan pembaruan dalam kolom tabel
        $diproses = 'Sedang Dimasak oleh Ahlinya';
        $update = pemesanan::where('id', $id)->update(['status_pemesanan' => $diproses]);
        
        // Periksa apakah pembaruan berhasil
        if ($update) {
            // Redirect ke halaman yang sesuai jika pembaruan berhasil
            return redirect('seller/{id}/status/detail/1');
        } else {
            // Redirect ke halaman lain jika pembaruan gagal
            return redirect()->back()->with('error', 'Gagal memperbarui status pemesanan.');
        }
    }
        
    public function seller_status_detail_1()
    {
        $pemesanan = pemesanan::all();
        return view('seller_status_detail_1',compact(['pemesanan']));

    }
    

    /**
     * Display the specified resource.
     */
    public function up_to_send(Request $request)
    {
        $id = $request->input('id');
        $diproses = $request->input('status_pemesanan');
        
        // Lakukan pembaruan dalam kolom tabel
        $diproses = 'Sedang diantar oleh driver professional';
        $update = pemesanan::where('id', $id)->update(['status_pemesanan' => $diproses]);
        
        // Periksa apakah pembaruan berhasil
        if ($update) {
            // Redirect ke halaman yang sesuai jika pembaruan berhasil
            return redirect('seller/{id}/status/detail/2');
        } else {
            // Redirect ke halaman lain jika pembaruan gagal
            return redirect()->back()->with('error', 'Gagal memperbarui status pemesanan.');
        }
    }

    public function seller_status_detail_2()
    {
        $pemesanan = pemesanan::all();
        return view('seller_status_detail_2',compact(['pemesanan']));

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function done_status(Request $request)
    {
        $id = $request->input('id');
        $diproses = $request->input('status_pemesanan');
        
        // Lakukan pembaruan dalam kolom tabel
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
        return view('seller_status_detail_3',compact(['pemesanan']));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, status_pesan $status_pesan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(status_pesan $status_pesan)
    {
        //
    }
}
