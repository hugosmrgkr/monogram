<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah admin sudah login menggunakan guard admin
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        return $next($request);
    }
}
