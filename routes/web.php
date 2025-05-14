<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\PreventBackHistory;

// ==========================
// Rute untuk User (Tamu)
// ==========================
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/owner', [PageController::class, 'owner'])->name('owner');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/service', [PageController::class, 'service'])->name('service');
Route::get('/tentang-kami', [PageController::class, 'tentangKami'])->name('tentang-kami');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::post('/komentar', [KomentarController::class, 'store'])->name('komentar.store');
Route::get('/hasil/{kategori?}', [PageController::class, 'hasil'])->name('hasil');

// ==========================
// Rute Login Admin (Tanpa Secret Code)
// ==========================
Route::get('/admin/login', function () {
    return view('auth.login');
})->middleware(PreventBackHistory::class)->name('admin.login');

// Proses login admin
Route::post('/admin/login', [AdminLoginController::class, 'login'])
    ->middleware(PreventBackHistory::class)->name('admin.login.submit');

// ==========================
// Rute Admin (Login Required)
// ==========================
Route::prefix('admin')->middleware([AdminMiddleware::class, PreventBackHistory::class])->name('admin.')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('gallery', GalleryController::class);
    Route::resource('tentang-kami', TentangKamiController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('layanan', LayananController::class);
    Route::resource('faq', FaqController::class);

    // Rute untuk Komentar
    Route::prefix('komentar')->name('komentar.')->group(function () {
        Route::get('/', [KomentarController::class, 'index'])->name('index');
        Route::post('/{id}/toggle', [KomentarController::class, 'toggle'])->name('toggle');
    });

    // Logout Admin
    Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});

// ==========================
// Fallback Route untuk URL yang tidak ditemukan
// ==========================
Route::fallback(function () {
    return redirect()->route('home');
});
