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
            $user = Auth::user();
            
            if ($user->role === 'admin') {
                return redirect()->route('kategori_admin.index');
            }
    
            if ($user->role === 'seller') {
                return redirect()->route('seller.dash');
            }
    
            return redirect()->intended(route('home'));
        }
        return redirect()->route('login')->with('error', 'Invalid email or password.');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Mengakhiri sesi pengguna
        $request->session()->invalidate(); // Mengosongkan sesi
        $request->session()->regenerateToken(); // Mencegah serangan CSRF

        return redirect('/'); // Mengarahkan pengguna kembali ke halaman landing page
    }

}