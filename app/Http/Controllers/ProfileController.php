<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman edit profile.
     *
     * @return \Illuminate\View\View
     */
    public function editProfile()
    {
        $user = Auth::user(); // Mengambil data pengguna yang sedang login
        return view('profil', compact('user'));
    }

    /**
     * Menyimpan perubahan pada profil pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validasi data yang diterima dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'old-password' => 'required|string|min:8',
            'new-password' => 'nullable|string|min:8|different:old-password|confirmed',
        ]);

        // Update profil pengguna
        $user->name = $request->name;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->nomor_telepon = $request->nomor_telepon;
        if ($request->has('new-password')) {
            $user->password = bcrypt($request->input('new-password'));
        }
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
