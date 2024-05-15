<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil, arahkan pengguna ke halaman home
            return redirect()->route('home');
        }
        // Jika autentikasi gagal, arahkan kembali ke halaman login dengan pesan error
             return redirect()->route('login')->with('error', 'Invalid email or password.');
    }
}
