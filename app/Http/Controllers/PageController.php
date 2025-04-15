<?php

namespace App\Http\Controllers;
use App\Models\Gallery;
use App\Models\About;
use Illuminate\Http\Request;

class PageController extends Controller
{


    // Halaman Home
    public function home()
    {
        $galleries = Gallery::take(4)->get();
        return view('home', compact('galleries'));
    }

    // Halaman Profil Owner
    public function about()
    {
        $abouts = About::all();
        return view('about',[
            'abouts' => $abouts
        ]);
    }

    // Halaman Profil Lengkap Monogram
    public function faq()
    {
        return view('faq');
    }

    // Halaman Pilihan Layanan
    public function service()
    {
        return view('service');
    }

    public function hasil($kategori = 'wisuda')
    {
        $kategori = strtolower($kategori);

        // Ambil foto berdasarkan kategori dari database
        $data = Gallery::where('kategori', ucfirst($kategori))->get();

        // Jika data kosong & kategori tidak valid, redirect ke home
        if ($data->isEmpty() && !in_array($kategori, ['wisuda', 'pasangan', 'pertemanan', 'keluarga'])) {
            return redirect()->route('home');
        }

        return view('hasil', [
            'kategori' => $kategori,
            'data' => $data,
        ]);
    }
}
