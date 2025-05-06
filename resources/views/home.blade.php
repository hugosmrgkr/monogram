@extends('layouts.app')

@section('title', 'Beranda')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
    <!-- Hero Section - Full Width -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-text">
            <h1 class="display-3 fw-bold">>monogram_</h1>
            <p class="lead">
                Selamat datang di website resmi Monogram Studio Balige.<br>
                Kami menyediakan layanan fotografi profesional dengan kualitas terbaik dan pengalaman tak terlupakan.
            </p>
        </div>
    </section>

    <!-- Section Berita Terkini -->
    <section class="news-header">
        <h2>Berita Terkini</h2>
        <p class="news-subtitle">
            Dapatkan update harian seputar kegiatan, pengumuman, dan informasi penting kampus.
        </p>
    </section>

    <div class="news-navigation">
        {{-- Wrapper biru full width --}}
        <div class="news-wrapper" id="newsContainer">
            {{-- Tambahan kontainer untuk batasi lebar konten --}}
            <div class="news-inner">
                <div class="news-navigation-inner">
                    @forelse ($beritas as $index => $berita)
                        <div class="news-daily-card" data-index="{{ $index }}" style="{{ $index !== 0 ? 'display:none;' : '' }}">
                            @if($berita->gambar)
                                <div class="news-img">
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita">
                                </div>
                            @endif
                            <div class="news-content">
                                <h3>{{ $berita->judul }}</h3>
                                <p>{{ Str::limit($berita->isi, 150, '...') }}</p>
                                <p class="news-date">
                                    Berlaku {{ \Carbon\Carbon::parse($berita->tanggal_mulai)->timezone('Asia/Jakarta')->format('d M Y') }}
                                    – {{ \Carbon\Carbon::parse($berita->tanggal_habis)->timezone('Asia/Jakarta')->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <p class="news-empty">Belum ada berita tersedia saat ini.</p>
                    @endforelse
                </div>

                <div class="news-buttons">
                    <button class="news-nav-btn" id="prevBtn">&#10094;</button>
                    <button class="news-nav-btn" id="nextBtn">&#10095;</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Benefits Section -->
    <section class="monogram-benefits section-padding" style="background-color: rgba(0, 0, 0, 0.05); padding-top: 60px; padding-bottom: 60px;">
        <div class="container">
            <div class="row">

            <div class="col-12 text-center">
                <h2 class="mb-3">Keuntungan</h2>
                <p class="mb-5" style="color: #555; font-size: 1.05rem; max-width: 700px; margin: 0 auto;">
                    Monogram Studio memberikan berbagai keuntungan yang dapat kamu nikmati saat melakukan sesi foto.
                    Dari fleksibilitas pengaturan tata letak hingga pencahayaan eksklusif, semua kami siapkan demi hasil terbaik untukmu.
                </p>
            </div>

                @foreach ([
                    ['image' => 'keuntungan1.png', 'title' => 'Tata Letak Foto', 'desc' => 'Pilih tata letak foto sesuai keinginanmu'],
                    ['image' => 'keuntungan2.png', 'title' => 'Warna Latar Sesuai Keinginan', 'desc' => 'Pilih warna latar sesuai keinginanmu'],
                    ['image' => 'keuntungan3.png', 'title' => 'Mode Spotlight', 'desc' => 'Foto lebih fokus dengan pencahayaan khusus']
                ] as $benefit)
                    <div class="col-lg-4 col-12 mb-3">
                        <div class="product-thumb">
                            <img src="{{ asset('assets/images/' . $benefit['image']) }}" alt="{{ $benefit['title'] }}" class="img-fluid product-image">
                            <div class="product-info d-flex">
                                <div>
                                    <h5 class="product-title mb-0">{{ $benefit['title'] }}</h5>
                                    <p class="product-p">{{ $benefit['desc'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <div class="monogram-gallery-section-wrapper position-relative py-5">
        <div class="gallery-background"></div>

        <div class="monogram-gallery-section container mb-5">
            <h2 class="monogram-gallery-title fw-bold mb-4">Recommended Foto</h2>

            <div class="lightbox" data-mdb-lightbox-init>
                <div class="multi-carousel overflow-hidden" id="monogram-carousel">
                    <div class="multi-carousel-inner d-flex" id="carousel-track">
                        @foreach ($galleries as $gallery)
                            <div class="multi-carousel-item me-2" style="flex: 0 0 auto; width: 300px;">
                                <img
                                    src="{{ asset('uploads/' . $gallery->gambar) }}"
                                    data-mdb-img="{{ asset('uploads/' . $gallery->gambar) }}"
                                    alt="Rekomendasi Foto"
                                    class="w-100 rounded shadow-sm"
                                />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('hasil') }}" class="btn btn-dark rounded-0 px-5 py-2">Lihat Hasil Foto</a>
            </div>
        </div>
    </div>

    <!-- Contact Form Komentar -->
    <section class="monogram-feedback-section">
        <div class="monogram-feedback-form container max-w-1305 p-4 bg-white rounded-3 shadow-sm border border-light mb-5">
            @if(session('success'))
                <div class="monogram-alert-success alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="monogram-alert-danger alert alert-danger">
                    <ul class="m-0 p-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('komentar.store') }}" method="POST"> <!-- Ganti ke route komentar.store -->
                @csrf
                <div class="monogram-input-group mb-3">
                    <label for="nama" class="form-label">Nama Pengguna<span class="text-danger">*</span></label>
                    <input type="text" name="nama" id="nama" required value="{{ old('nama') }}" class="monogram-input form-control" placeholder="Nama">
                </div>
                <div class="monogram-textarea-group mb-3">
                    <label for="komentar" class="form-label">Komentar <span class="text-danger">*</span></label>
                    <textarea name="komentar" id="komentar" rows="5" required class="monogram-textarea form-control">{{ old('komentar') }}</textarea>
                </div>
                <div class="monogram-submit-btn d-flex justify-content-start">
                    <button type="submit" class="monogram-submit-btn btn btn-dark px-5 py-2">Kirim Komentar</button>
                </div>
            </form>
        </div>
    </section>

    {{-- Tampilkan Komentar yang Disetujui --}}
    @if($komentars->isNotEmpty()) <!-- Ganti 'ulasans' menjadi 'komentars' -->
    <div class="monogram-feedbacks-container mt-5">
        <div class="monogram-feedbacks">
            <div class="monogram-feedbacks-title-wrapper text-center">
                <h3 class="monogram-feedbacks-title mb-4 text-2xl font-bold">Apa Kata Mereka?</h3>
                <div class="monogram-feedbacks-line mx-auto"></div>
            </div>
            <!-- Kontainer Komentar -->
            <div class="monogram-feedbacks-wrapper" id="feedbackWrapper">
                @foreach($komentars as $komentar) <!-- Ganti 'ulasans' menjadi 'komentars' -->
                    @if($komentar->is_approve) <!-- Pastikan hanya komentar yang disetujui yang tampil -->
                        <div class="monogram-feedback-card">
                            <div class="feedback-card-body">
                                <h4 class="feedback-user-name">{{ $komentar->nama ?? 'Anonim' }}</h4> <!-- Ganti 'name' menjadi 'nama' -->
                                <div class="feedback-name-line"></div>
                                <p class="feedback-user-quote">"{{ $komentar->komentar }}"</p> <!-- Ganti 'ulasan' menjadi 'komentar' -->
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @endif
@endsection
