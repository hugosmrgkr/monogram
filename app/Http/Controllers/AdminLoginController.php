<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminLoginController extends Controller
{
    // Tampilkan form login admin
    public function showLoginForm()
    {
        if (Auth::check()) {
            // Jika admin sudah login, arahkan ke dashboard
            return redirect()->route('admin.dashboard');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Menggunakan guard admin saat login
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika login berhasil, arahkan ke dashboard
            return redirect()->route('admin.dashboard');
        }

        // Jika login gagal, kembali ke halaman login dengan error
        return back()->withErrors([
            'email' => 'Kredensial tidak cocok.',
        ]);
    }



    // Logout admin
    public function logout(Request $request)
    {
        // Logout admin menggunakan Auth::logout()
        Auth::logout();

        // Hapus semua sesi dan token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Arahkan kembali ke halaman utama
        return redirect()->route('home');
    }
}
