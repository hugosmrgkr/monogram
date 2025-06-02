<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\TentangKami;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Komentar;
use App\Models\Berita;
use Carbon\Carbon;
use App\Models\Layanan;

class PageController extends Controller
{
    // Halaman Home
    public function home()
    {
        $galleries = Gallery::all();
        $komentars = Komentar::where('is_approve', true)->latest()->get();  // Ubah 'ulasans' menjadi 'komentars'

        // Ambil berita yang aktif (sesuai tanggal berlaku)
        $beritas = Berita::whereDate('tanggal_mulai', '<=', Carbon::now())
                         ->whereDate('tanggal_habis', '>=', Carbon::now())
                         ->latest()
                         ->get();

        return view('home', compact('galleries', 'komentars', 'beritas'));
    }

    // Halaman Profil Owner
    public function tentangKami()
    {
        $tentangKami = TentangKami::all();
        $title = 'Tentang Kami';
        return view('tentangkami', compact('title', 'tentangKami'));
    }


    // Halaman Profil Lengkap Monogram
    public function faq()
    {
        $faqs = Faq::all();
        return view('faq', compact('faqs'));
    }

    // Halaman Pilihan Layanan
    public function service()
    {
        $layanans = Layanan::all();
        return view('service', compact('layanans'));
    }

    public function hasil(Request $request, $kategori = 'wisuda')
    {
        $kategori = strtolower($kategori);

        // Validasi kategori
        if (!in_array($kategori, ['wisuda', 'pasangan', 'pertemanan', 'keluarga', 'lainnya'])) {
            return redirect()->route('home');
        }

        // Ambil foto berdasarkan kategori, dengan paginasi 10 item per halaman
        $data = Gallery::where('kategori', ucfirst($kategori))->paginate(8);

        return view('hasil', [
            'kategori' => $kategori,
            'data' => $data,
        ]);
    }
}