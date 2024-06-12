<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use App\Models\SellerDash;
use App\Models\SellerDash1;
use App\Models\SellerDash2;
use App\Models\Pemesananitem;
use App\Models\menu_warungs;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



class statusControl extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function seller_status()
    {   
        $id_seller = auth()->id();
        
        // Fetch pemesanan with related pemesananItems and menu_warungs
        $pemesanan = Pemesanan::with(['pemesananItems.menu_warungs'])
                        ->where('seller_id', $id_seller)
                        ->where('status_pemesanan', '!=', 'Pesanan Diterima dan selesai')
                        ->get();
    
        return view('kelola_status.seller_status', compact('pemesanan'));
    }



public function order_status(Request $request)
{
    $id_user = Auth::id(); 
    
    $pemesanan = Pemesanan::with('user')
        ->where('user_id', $id_user)
        ->where('status_pemesanan', '!=', 'Pesanan Diterima dan selesai')
        ->get();

    $Pemesananitem = Pemesananitem::where('user_id', $id_user)->get();
    
    $user = User::find($id_user);

    if (!$user) {
        return redirect()->back()->with('error', 'User not found');
    }

    return view('kelola_status.cust_status', compact('pemesanan', 'Pemesananitem', 'user'));
}


    public function order_status_detail(Request $request)
    {   
        $pemesanan = Pemesanan::findOrFail($request->id)
                                ->with('menu_warungs');  

        $Pemesananitems = Pemesananitem::where('pemesanan_id', $request->id)
                                        ->get();
        
        return view('kelola_status.cust_status_detail', compact('pemesanan', 'Pemesananitems'));
        
        
    }

    public function seller_status_detail(Request $request)
    {   
        $pemesanan = Pemesanan::findOrFail($request->id);

       
        $Pemesananitem = Pemesananitem::where('pemesanan_id', $request->id)
                                        ->with('menu_warungs')
                                        ->get();
        return view('kelola_status.seller_status_detail',compact(['pemesanan','Pemesananitem']));

    }


    public function up_to_cook(Request $request)
    {   

        $request->validate([
            'id' => 'required|integer|exists:pemesanan,id',
        ]);
    
        $id = $request->input('id');
        $diproses = 'Sedang Dimasak oleh Ahlinya';
    
        // Update status pemesanan
        $update = pemesanan::where('id', $id)->update(['status_pemesanan' => $diproses]);
    
        // Redirect berdasarkan hasil update
        if ($update) {
            return redirect("seller/{$id}/status/detail/1")->with('success', 'Status berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui status pemesanan.');
        }
    }
    
    public function seller_status_detail_1(Request $request)
    {
        $pemesanan = Pemesanan::findOrFail($request->id);
       
        $Pemesananitem = Pemesananitem::where('pemesanan_id', $request->id)
                                        ->with('menu_warungs')
                                        ->get();
        return view('kelola_status.seller_status_detail_1',compact(['pemesanan']));

    }
    

    public function up_to_send(Request $request)
    {
        $id = $request->input('id');
        $diproses = $request->input('status_pemesanan');
        

        $diproses = 'Sedang diantar oleh driver professional';
        $update = pemesanan::where('id', $id)->update(['status_pemesanan' => $diproses]);
        
        if ($update) {
            return redirect("seller/{$id}/status/detail/2");
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui status pemesanan.');
        }
    }

    public function seller_status_detail_2(Request $request)
    {
        $pemesanan = Pemesanan::findOrFail($request->id);

       
        $Pemesananitem = Pemesananitem::where('pemesanan_id', $request->id)
                                        ->with('menu_warungs')
                                        ->get();
        return view('kelola_status.seller_status_detail_2',compact(['pemesanan']));

    }

    public function done_status(Request $request)
    {
        $id = $request->input('id');
        $diproses = 'Pesanan Diterima dan selesai';
        pemesanan::where('id', $id)->update(['status_pemesanan' => $diproses]);
    
        $currentDateTime = Carbon::now();
        $pemesanan = Pemesanan::find($id);
        $pemesanan->confirmation_at = $currentDateTime;
        $pemesanan->save();
    
        // Mengambil semua data
        $totalCountAll = Pemesanan::where('status_pemesanan', 'Pesanan Diterima dan selesai')
        ->whereHas('pemesananitems')
        ->count();
         session(['totalOrders' => $totalCountAll]);
    

        $totalAmountAll = Pemesanan::where('status_pemesanan', 'Pesanan Diterima dan selesai')
        ->whereHas('pemesananitems')
        ->withSum('pemesananitems as total_semua_menu', 'total_semua_menu')
        ->get()
        ->sum('total_semua_menu');
    
        // Mengupdate atau membuat data di SellerDash (semua data)
        $sellerDash = SellerDash::find(1);
    
        if ($sellerDash) {
            $sellerDash->total_pemesanan = $totalCountAll;
            $sellerDash->total_harga = $totalAmountAll;
            $sellerDash->save();
        } else {
            SellerDash::create([
                'total_pemesanan' => $totalCountAll,
                'total_harga' => $totalAmountAll,
            ]);

        }

        // Filter untuk 1 bulan terakhir
        $tanggalSatuBulanLalu = Carbon::now()->subMonth(1);
        $tanggalHariIni = Carbon::now();
    
        $countLastOneMonth = Pemesanan::where('status_pemesanan', 'Pesanan Diterima dan selesai')
        ->where('confirmation_at', '>=', $tanggalSatuBulanLalu)
        ->where('confirmation_at', '<=', $tanggalHariIni)
        ->withCount('pemesananitems')
        ->count();

        $totalAmountLastOneMonth = Pemesanan::where('status_pemesanan', 'Pesanan Diterima dan selesai')
            ->where('confirmation_at', '>=', $tanggalSatuBulanLalu)
            ->where('confirmation_at', '<=', $tanggalHariIni)
            ->whereHas('pemesananitems', function ($query) {
                // Di sini Anda bisa menambahkan kondisi tambahan jika diperlukan
            })
            ->withSum('pemesananitems as total_semua_menu', 'total_semua_menu')
            ->get()
            ->sum('total_semua_menu');

    
        // Mengupdate atau membuat data di SellerDash2 (1 bulan terakhir)
        $sellerDash2 = SellerDash2::find(1);
    
        if ($sellerDash2) {
            $sellerDash2->Total_pemesanan2 = $countLastOneMonth;
            $sellerDash2->Total_harga2 = $totalAmountLastOneMonth;
            $sellerDash2->save();
        } else {
            SellerDash2::create([
                'Total_pemesanan2' => $countLastOneMonth,
                'Total_harga2' => $totalAmountLastOneMonth,
            ]);
        }
    
        return redirect('seller/status');
    }
    
    public function seller_status_detail_3()
    {
        $pemesanan = pemesanan::all();

    }

}