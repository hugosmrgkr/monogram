@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <section class="hero-section">
        <div class="hero-text">
            <h1 class="hero-title">>monogram_</h1>
            <p class="hero-description">Capturing your best moments with passion and precision.</p>
        </div>
    </section>

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
