<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class PageController extends Controller
{


    // Halaman Home
    public function home()
    {
        return view('home');
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

    // Halaman Hasil (Gallery Berdasarkan Kategori)
    public function hasil($kategori = 'wisuda')
    {
        $galleries = [
            'wisuda' => [
                'title' => 'Foto Wisuda',
                'images' => ['foto1.png', 'foto2.png', 'foto3.png', 'foto4.png', 'foto5.png', 'foto6.png', 'foto7.png', 'foto8.png'],
            ],
            'pasangan' => [
                'title' => 'Foto Pasangan',
                'images' => ['pasangan1.png', 'pasangan2.png', 'pasangan3.png', 'pasangan4.png'],
            ],
            'pertemanan' => [
                'title' => 'Foto Pertemanan',
                'images' => ['teman1.png', 'teman2.png', 'teman3.png', 'teman4.png'],
            ],
            'keluarga' => [
                'title' => 'Foto Keluarga',
                'images' => ['keluarga1.png', 'keluarga2.png', 'keluarga3.png', 'keluarga4.png'],
            ],
        ];

        // Jika kategori tidak valid, default ke 'wisuda'
        $gallery = $galleries[$kategori] ?? $galleries['wisuda'];

        return view('hasil', [
            'title' => $gallery['title'],
            'images' => $gallery['images'],
            'kategori' => $kategori,
        ]);
    }
}
