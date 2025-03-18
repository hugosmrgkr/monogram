<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Data untuk bagian Keuntungan
        $benefits = [
            [
                'title' => 'Pilihan Tata Letak Hasil Foto',
                'description' => 'Pilih tata letak sesuai keinginanmu',
                'image' => 'assets/images/keuntungan1.png'
            ],
            [
                'title' => 'BEBAS WARNA LATAR FOTO',
                'description' => 'Pilih warna latar sesuai keinginanmu',
                'image' => 'assets/images/keuntungan2.png'
            ],
            [
                'title' => 'Tersedia spotlight mode',
                'description' => 'Pilih spotlight sesuai keinginanmu',
                'image' => 'assets/images/keuntungan3.png'
            ],
        ];

        // Data untuk bagian Recommended Foto
        $recommendedPhotos = [
            [
                'title' => 'Family Album',
                'description' => 'The Johnson Family',
                'image' => 'assets/images/rec1.png'
            ],
            [
                'title' => 'Graduation Session',
                'description' => 'Solo Photoshoot',
                'image' => 'assets/images/rec2.png'
            ],
            [
                'title' => 'Fashion Photography',
                'description' => 'Studio Exclusive',
                'image' => 'assets/images/rec3.png'
            ],
            [
                'title' => 'Group Photoshoot',
                'description' => 'Special Occasion',
                'image' => 'assets/images/rec4.png'
            ],
        ];

        return view('home', compact('benefits', 'recommendedPhotos'));
    }
}
