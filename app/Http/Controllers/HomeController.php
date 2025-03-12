<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Data for benefits section
        $benefits = [
            [
                'title' => 'Foto Soft Copy HD',
                'description' => 'Dapatkan foto berkualitas tinggi',
                'image' => 'assets/images/benefits/softcopy.jpg'
            ],
            [
                'title' => 'Make Makeup Langsung',
                'description' => 'Layanan makeup profesional',
                'image' => 'assets/images/benefits/makeup.jpg'
            ],
            [
                'title' => 'Kostum lengkap untuk customer',
                'description' => 'Pilihan kostum beragam',
                'image' => 'assets/images/benefits/costume.jpg'
            ]
        ];

        // Data for recommended photos
        $recommendedPhotos = [
            [
                'title' => 'Pre Wedding',
                'description' => 'John & Jane - October 21, 2023',
                'image' => 'assets/images/portfolio/prewedding.jpg'
            ],
            [
                'title' => 'Family Album',
                'description' => 'The Johnson Family',
                'image' => 'assets/images/portfolio/family.jpg'
            ],
            [
                'title' => 'Pre Wedding',
                'description' => 'Mike & Sarah - December 2, 2023',
                'image' => 'assets/images/portfolio/prewedding2.jpg'
            ],
            [
                'title' => 'Solo Photoshoot',
                'description' => 'Graduation Session',
                'image' => 'assets/images/portfolio/solo.jpg'
            ]
        ];

        return view('home', compact('benefits', 'recommendedPhotos'));
    }
}
