<?php

namespace App\Http\Controllers;

use App\Models\acc_pemesanan;
use Illuminate\Http\Request;

class statusControl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function seller_status()
    {
        $acc_pemesanan = acc_pemesanan::all();
        return view('seller_status',compact(['acc_pemesanan']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function seller_status_detail()
    {
        $acc_pemesanan = acc_pemesanan::all();
        return view('seller_status_detail',compact(['acc_pemesanan']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function up_to_cook(Request $request)
    {
    
        $id = $request->input('id');
        $diproses = $request->input('status_acc_pemesanan');
        
        // Lakukan pembaruan dalam kolom tabel
        $diproses = 'Sedang Dimasak oleh Ahlinya';
        $update = acc_pemesanan::where('id', $id)->update(['status_pemesanan' => $diproses]);
        
        // Periksa apakah pembaruan berhasil
        if ($update) {
            // Redirect ke halaman yang sesuai jika pembaruan berhasil
            return redirect('seller/{id}/status/detail/1');
        } else {
            // Redirect ke halaman lain jika pembaruan gagal
            return redirect()->back()->with('error', 'Gagal memperbarui status acc_pemesanan.');
        }
    }
        
    public function seller_status_detail_1()
    {
        $acc_pemesanan = acc_pemesanan::all();
        return view('seller_status_detail_1',compact(['acc_pemesanan']));

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
        $update = acc_pemesanan::where('id', $id)->update(['status_pemesanan' => $diproses]);
        
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
        $acc_pemesanan = acc_pemesanan::all();
        return view('seller_status_detail_2',compact(['acc_pemesanan']));

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
        $update = acc_pemesanan::where('id', $id)->update(['status_pemesanan' => $diproses]);
        

        if ($update) {
            return redirect('seller/{id}/status/detail/3');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui status acc_pemesanan.');
        }
    }

    public function seller_status_detail_3()
    {
        $acc_pemesanan = acc_pemesanan::all();
        return view('seller_status_detail_3',compact(['acc_pemesanan']));

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
