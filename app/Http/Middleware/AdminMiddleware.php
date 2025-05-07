<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah admin_id ada dalam session
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login', ['secret' => env('ADMIN_SECRET_CODE')]);
        }

        return $next($request);
    }
}
