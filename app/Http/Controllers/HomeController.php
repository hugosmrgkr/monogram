<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Berita;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index()
    {
        // Ambil 3 galeri terbaru
        $galleries = Gallery::take(3)->get();

        // Ambil berita yang aktif berdasarkan tanggal mulai & habis
        $beritas = Berita::whereDate('tanggal_mulai', '<=', Carbon::now())
                         ->whereDate('tanggal_habis', '>=', Carbon::now())
                         ->latest()
                         ->get();

        return view('home', [
            'galeris' => $galleries,
            'beritas' => $beritas
        ]);
    }
}
