@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section - Full Width -->
    <div class="hero-section position-relative mb-4">
        <div class="container-fluid p-0">
            <img src="{{ asset('assets/images/home.png') }}" alt="Monogram Toba Studio" class="img-fluid w-100" style="max-height: 600px; object-fit: cover;">
            <div class="hero-text position-absolute top-50 start-50 translate-middle text-white text-center">
                <h1 class="monogram-title">>monogram</h1>
            </div>
        </div>
    </div>

    <style>
        .monogram-title {
            font-family: 'Arial', sans-serif;
            font-weight: 900;
            font-size: 8rem;
            color: white;
            text-transform: lowercase;
            letter-spacing: 3px;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.9), 
                         0 0 35px rgba(255, 255, 255, 0.7);
            filter: blur(0.8px);
        }

        @media (max-width: 992px) {
            .monogram-title {
                font-size: 6rem;
            }
        }

        @media (max-width: 576px) {
            .monogram-title {
                font-size: 4rem;
            }
        }
    </style>

    <!-- Header Text -->
    <div class="container mb-4">
        <h1 class="fw-bold">MONOGRAM TOBA</h1>
        <p>Welcome to website Monogram Studio Balige</p>
    </div>

    <!-- Benefits Section -->
    <div class="container mb-5">
        <h2 class="fw-bold mb-4">Keuntungan</h2>
        <div class="row g-4">   
            @foreach ([
                ['image' => 'keuntungan1.png', 'title' => 'Pilihan Tata Letak Hasil Foto', 'desc' => 'Pilih tata letak sesuai keinginanmu'],
                ['image' => 'keuntungan2.png', 'title' => 'BEBAS WARNA LATAR FOTO', 'desc' => 'Pilih warna latar sesuai keinginanmu'],
                ['image' => 'keuntungan3.png', 'title' => 'Tersedia spotlight mode', 'desc' => 'Pilih spotlight sesuai keinginanmu']
            ] as $benefit)
                <div class="col-md-4">
                    <div class="card border-0">
                        <img src="{{ asset('assets/images/' . $benefit['image']) }}" class="card-img-top" alt="{{ $benefit['title'] }}">
                        <div class="card-body px-0">
                            <h5 class="fw-bold mb-2">{{ $benefit['title'] }}</h5>
                            <p class="text-muted">{{ $benefit['desc'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Recommended Photos Section -->
    <div class="container mb-5">
        <h2 class="fw-bold mb-4">Recomended Foto</h2>
        <div class="row g-4">
            @foreach (['rec1.png', 'rec2.png', 'rec3.png', 'rec4.png'] as $rec)
                <div class="col-md-3 col-6">
                    <img src="{{ asset('assets/images/' . $rec) }}" class="img-fluid" alt="Rekomendasi Foto">
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="#" class="btn btn-dark rounded-0 px-5 py-2">Hasil Foto</a>
        </div>
    </div>

    <!-- Studio Images -->
    <div class="container mb-5">
        <div class="row g-4">
            @foreach (['Foot1.png', 'Foot2.png'] as $foot)
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/' . $foot) }}" class="img-fluid rounded-0 w-100" alt="Monogram Studio">
                </div>
            @endforeach
        </div>
    </div>

    <!-- Contact Form -->
    <div class="container mb-5">
        <h2 class="fw-bold mb-4">Hubungi Kami</h2>
        <form action="#" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control rounded-0" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control rounded-0" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Pesan</label>
                <textarea class="form-control rounded-0" id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-dark rounded-0 px-5 py-2">Kirim</button>
        </form>
    </div>
@endsection