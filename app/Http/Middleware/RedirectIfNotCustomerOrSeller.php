<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotCustomerOrSeller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && (Auth::user()->role == 'customer' || Auth::user()->role == 'seller')) {
            return $next($request);
        }
        
        if (Auth::check() && Auth::user()->role == 'admin') {
            return redirect()->route('admin.kategori');
        }
        
        return redirect()->route('login');
    }
}
