<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan Halaman Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses Login
    public function login(Request $request)
    {
        // Validasi Input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        // Ambil Credential
        $credentials = $request->only('username', 'password');

        // Coba Login
        if (Auth::attempt($credentials)) {
            // Regenerate Session untuk Keamanan
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Selamat datang di Monogram Toba!');
        }

        // Jika Gagal Login
        return back()->withErrors([
            'error' => 'Username atau password salah.',
        ])->withInput();
    }

    // Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();

        // Hapus Session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success', 'Berhasil logout.');
    }
}
