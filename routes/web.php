<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Auth;

// Rute untuk User (Tamu & Admin)
Route::get('/', [PageController::class, 'home'])->name('home');

// Halaman Profil Owner
Route::get('/owner', [PageController::class, 'owner'])->name('owner');

// Halaman Profil Lengkap Monogram
Route::get('/profil', [PageController::class, 'profil'])->name('profil');

// Halaman Pilihan Layanan
Route::get('/service', [PageController::class, 'service'])->name('service');

// Rute Hasil Foto (Kategori)
Route::prefix('hasil')->group(function () {
    Route::get('/{kategori?}', [PageController::class, 'hasil'])->name('hasil');
    Route::get('/wisuda', [PageController::class, 'hasilWisuda'])->name('hasil.wisuda');
    Route::get('/pasangan', [PageController::class, 'hasilPasangan'])->name('hasil.pasangan');
    Route::get('/pertemanan', [PageController::class, 'hasilPertemanan'])->name('hasil.pertemanan');
    Route::get('/keluarga', [PageController::class, 'hasilKeluarga'])->name('hasil.keluarga');
});

// Rute untuk Admin (Harus login terlebih dahulu)
Route::prefix('admin')->middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('gallery', GalleryController::class);
});

// Rute Otentikasi
Auth::routes();
Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
