<?php
namespace App\Http\Controllers;
use App\Models\Pemesanan;




use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::all();
        return view('pemesanan.index', compact(['pemesanan']));

    }

    public function destroy($id)
    {
        $pemesanan = Pemesanan::find($id);
        $pemesanan->delete();
        return redirect('/pemesanan');
    }
    
}


