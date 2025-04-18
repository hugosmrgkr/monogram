<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UlasanController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\AboutController;

// ==========================
// Rute untuk User (Tamu)
// ==========================
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/owner', [PageController::class, 'owner'])->name('owner');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/service', [PageController::class, 'service'])->name('service');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');

// Ulasan oleh user
Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');

// ==========================
// Rute Hasil Foto (Kategori Dinamis)
// ==========================
Route::get('/hasil/{kategori?}', [PageController::class, 'hasil'])->name('hasil');

// ==========================
// Rute untuk Admin (Harus login)
// ==========================
Route::prefix('admin')->middleware(['auth', AdminMiddleware::class])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');

    // Resource routes
    Route::resource('gallery', GalleryController::class);       // admin.gallery.*
    Route::resource('about', AboutController::class);           // admin.about.*
    Route::resource('berita', BeritaController::class);         // admin.berita.*
    Route::resource('layanan', LayananController::class);       // admin.layanan.*
    Route::resource('faq', FaqController::class);               // admin.faq.*

    // Manajemen Ulasan
    Route::prefix('ulasan')->name('ulasan.')->group(function () {
        Route::get('/', [UlasanController::class, 'index'])->name('index');
        Route::post('/{id}/approve', [UlasanController::class, 'approve'])->name('approve');
        Route::post('/{id}/reject', [UlasanController::class, 'reject'])->name('reject');
    });
});

// ==========================
// Rute Otentikasi
// ==========================
Auth::routes([
    'register' => true,
]);

// Override logout Laravel
Route::middleware('auth')->post('/logout', [LoginController::class, 'logout'])->name('logout');

// ==========================
// Fallback untuk route yang tidak ditemukan
// ==========================
Route::fallback(function () {
    return redirect()->route('home');
});
