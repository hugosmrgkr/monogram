<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        if (session()->has('admin_id')) {
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

        // Cek kredensial admin
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && password_verify($request->password, $admin->password)) {
            // Set sesi login
            session(['admin_id' => $admin->admin_id]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Kredensial tidak cocok.',
        ]);
    }

    // public function logout()
    // {
    //     session()->forget('admin_id');
    //     return redirect()->route('admin.login');
    // }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
