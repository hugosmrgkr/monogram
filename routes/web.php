<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;

// Dashboard sebagai halaman awal
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Halaman login (khusus admin)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Halaman home (bisa diakses oleh tamu & admin)
Route::get('/home', [PageController::class, 'home'])->name('home');

// Halaman Profil Owner
Route::get('/owner', [PageController::class, 'owner'])->name('owner');

// Halaman Profil Lengkap Monogram
Route::get('/profil', [PageController::class, 'profil'])->name('profil');

// Halaman Pilihan Layanan
Route::get('/service', [PageController::class, 'service'])->name('service');

// Rute Hasil Foto
Route::get('/hasil/{kategori?}', [PageController::class, 'hasil'])->name('hasil');

Route::get('/hasil/wisuda', [PageController::class, 'hasilWisuda'])->name('hasil.wisuda');
Route::get('/hasil/pasangan', [PageController::class, 'hasilPasangan'])->name('hasil.pasangan');
Route::get('/hasil/pertemanan', [PageController::class, 'hasilPertemanan'])->name('hasil.pertemanan');
Route::get('/hasil/keluarga', [PageController::class, 'hasilKeluarga'])->name('hasil.keluarga');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
