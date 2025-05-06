<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Komentar;
use App\Models\Berita;
use App\Models\Faq;
use App\Models\Layanan;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.dashboard', [
            'title'         => 'Dashboard',
            'totalGaleri'   => Gallery::count(),
            'totalKomentar' => Komentar::count(),
            'totalBerita'   => Berita::whereDate('tanggal_habis', '>=', now())->count(),
            'totalFaq'      => Faq::count(),
            'totalLayanan'  => Layanan::count(),
        ]);
    }
}
