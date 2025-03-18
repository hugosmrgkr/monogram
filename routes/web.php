<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

// Dashboard sebagai halaman awal
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Halaman login (khusus admin)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Halaman home (bisa diakses oleh tamu & admin)
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
