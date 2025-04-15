@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section - Full Width -->
     <br>
     <br>
     <br>
    <div class="container mb-4">
        <h1 class="fw-bold">MONOGRAM TOBA</h1>
        <p>Welcome to website Monogram Studio Balige</p>
    </div>
    <div class="hero-section position-relative mb-4">
        <div class="container-fluid p-0">
            <img src="{{ asset('assets/images/home.png') }}" alt="Monogram Toba Studio" class="img-fluid w-100" style="max-height: 600px; object-fit: cover;">
            <div class="hero-text position-absolute top-50 start-50 translate-middle text-white text-center">
                <h1 class="monogram-title">>monogram_</h1>
            </div>
        </div>
    </div>

    <style>
        .monogram-title {
            font-family: 'Arial', sans-serif;
            font-weight: 900;
            font-size: 5rem;
            color: white;
            text-transform: lowercase;
            letter-spacing: 3px;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.9),
                         0 0 35px rgba(255, 255, 255, 0.7);
            filter: blur(0.4px);
        }

        @media (max-width: 992px) {
            .monogram-title {
                font-size: 6rem ;   Q
            }
        }

        @media (max-width: 576px) {
            .monogram-title {
                font-size: 4rem;
            }
        }
    </style>

    <!-- Header Text -->


    <!-- Benefits Section -->
    <div style="width: 100%; padding: 80px; background: white">
    <h2 style="font-family: Inter; font-size: 32px; font-weight: 700; color: black; margin-bottom: 40px">Keuntungan</h2>
    <div style="display: flex; gap: 32px; flex-wrap: wrap">
        @foreach ([
            ['image' => 'keuntungan1.png', 'title' => 'Pilihan Tata Letak Hasil Foto', 'desc' => 'Pilih Tata letak foto sesuai keinginanmu'],
            ['image' => 'keuntungan2.png', 'title' => 'BEBAS WARNA LATAR FOTO', 'desc' => 'Pilih warna latar sesuai keinginanmu'],
            ['image' => 'keuntungan3.png', 'title' => 'Tersedia spotlight mode', 'desc' => '']
        ] as $benefit)
            <div style="width: 300px">
                <img src="{{ asset('assets/images/' . $benefit['image']) }}" alt="{{ $benefit['title'] }}" style="width: 100%; border-radius: 10px; margin-bottom: 16px;">
                <h5 style="font-family: Inter; font-size: 16px; font-weight: 700; color: black; margin-bottom: 8px;">{{ $benefit['title'] }}</h5>
                <p style="font-family: Inter; font-size: 14px; color: #555;">{{ $benefit['desc'] }}</p>
            </div>
        @endforeach
    </div>
</div>
    <!-- Recommended Photos Section -->
    <div class="container mb-5">
        <h2 class="fw-bold mb-4">Recommended Foto</h2>

        <div class="row g-4 justify-content-center">
            @forelse($galleries as $gallery)
                <div class="col-md-3 col-6">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ asset('uploads/' . $gallery->gambar) }}" class="card-img-top img-fluid" alt="Rekomendasi Foto">
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Belum ada foto rekomendasi.</p>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('hasil') }}" class="btn btn-dark rounded-0 px-5 py-2">Lihat Hasil Foto</a>
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
