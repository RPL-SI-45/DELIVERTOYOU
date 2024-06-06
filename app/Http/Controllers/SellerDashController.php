<?php

namespace App\Http\Controllers;
use App\Models\SellerDash;
use App\Models\SellerDash1;
use App\Models\SellerDash2;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class SellerDashController extends Controller
{
    public function index(Request $request)
    {
        $SellerDash = SellerDash::all();
        return view('Sellerdash.Sellerdash', compact('SellerDash'));
    }

    public function Month1(Request $request)
    {
        $SellerDash2 = SellerDash2::all();
        return view('Sellerdash.Sellerdash3', compact('SellerDash2'));
    }

    public function EditProfileToko($id)
    {
        $user = User::find($id);
        return view('SellerProfile', compact(['user']));
    }

    public function UpdateProfileToko($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'nomor_telepon' => 'required|string|max:20',
            'nama_toko' => 'nullable|string|max:255',
            'alamat_toko' => 'nullable|string|max:255',
            'qrcode' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);


        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->nomor_telepon = $request->nomor_telepon;
        $user->nama_toko = $request->nama_toko;
        $user->alamat_toko = $request->alamat_toko;

        if ($request->hasFile('qrcode')) {
            // Hapus gambar qrcode lama jika ada
            if ($user->qrcode) {
                Storage::delete($user->qrcode);
            }

            // Simpan gambar qrcode baru
            $path = $request->file('qrcode')->store('public/qrcodes');
            $user->qrcode = $path;
        }

        $user->save();

        return redirect('/seller/dash')->with('success', 'Profile updated successfully');
    }

}

