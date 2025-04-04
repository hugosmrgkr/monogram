<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\AdminDashboardController;

// ==========================
// Rute untuk User (Tamu)
// ==========================
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/owner', [PageController::class, 'owner'])->name('owner');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/service', [PageController::class, 'service'])->name('service');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/faq', function () {
    return view('faq');
})->name('faq');

// ==========================
// Rute Hasil Foto (Kategori)
// ==========================
Route::prefix('hasil')->group(function () {
    Route::get('/{kategori?}', [PageController::class, 'hasil'])->name('hasil');
    Route::get('/wisuda', [PageController::class, 'hasilWisuda'])->name('hasil.wisuda');
    Route::get('/pasangan', [PageController::class, 'hasilPasangan'])->name('hasil.pasangan');
    Route::get('/pertemanan', [PageController::class, 'hasilPertemanan'])->name('hasil.pertemanan');
    Route::get('/keluarga', [PageController::class, 'hasilKeluarga'])->name('hasil.keluarga');
});

// ==========================
// Rute untuk Admin (Harus login)
// ==========================
Route::prefix('admin')->middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('gallery', GalleryController::class);
});

// ==========================
// Rute Otentikasi
// ==========================
Auth::routes();
Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
