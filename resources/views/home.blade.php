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
    <!-- Judul dan Deskripsi -->
    <section class="news-header">
        <h2>Berita Terkini</h2>
        <p class="news-subtitle">
        Dapatkan update harian seputar kegiatan, pengumuman, dan informasi penting kampus.
        </p>
  </section>

  <!-- Wrapper Berita -->
  <div class="news-wrapper">
    @forelse ($beritas as $berita)
      <div class="news-daily-card">
        @if($berita->gambar)
        <div class="news-img">
          <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita">
        </div>
        @endif

        <div class="news-content">
          <h3>{{ $berita->judul }}</h3>
          <p>{{ Str::limit($berita->isi, 150, '...') }}</p>
          <p class="news-date">
            Berlaku {{ \Carbon\Carbon::parse($berita->tanggal_mulai)->format('d M Y') }}
            – {{ \Carbon\Carbon::parse($berita->tanggal_akhir)->format('d M Y') }}
          </p>
        </div>
      </div>
    @empty
      <p class="news-empty">Belum ada berita tersedia saat ini.</p>
    @endforelse
  </div>

    {{-- <div class="container my-5">
        <h2 class="fw-bold mb-4">Berita Terkini</h2>

        @forelse ($beritas as $berita)
            <div class="card mb-4 border-0 shadow-sm">
                <div class="row g-0 align-items-center">
                    @if($berita->gambar)
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-fluid rounded-start" alt="Gambar Berita">
                    </div>
                    @endif
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $berita->judul }}</h5>
                            <p class="card-text">{{ $berita->isi }}</p>
                            <p class="card-text">
                                <small class="text-muted">
                                    Berlaku dari {{ \Carbon\Carbon::parse($berita->tanggal_mulai)->format('d M Y') }}
                                    sampai {{ \Carbon\Carbon::parse($berita->tanggal_akhir)->format('d M Y') }}
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <p class="text-muted">Belum ada berita tersedia saat ini.</p>
        @endforelse
    </div> --}}

    <!-- Benefits Section -->
    <div class="monogram-benefits-section container py-5 bg-white">
        <h2 class="monogram-benefits-title text-black fw-bold mb-4">Keuntungan</h2>
        <div class="monogram-benefits-container d-flex gap-4 flex-wrap justify-content-center">
            @foreach ([
                ['image' => 'keuntungan1.png', 'title' => 'Pilihan Tata Letak Hasil Foto', 'desc' => 'Pilih Tata letak foto sesuai keinginanmu'],
                ['image' => 'keuntungan2.png', 'title' => 'BEBAS WARNA LATAR FOTO', 'desc' => 'Pilih warna latar sesuai keinginanmu'],
                ['image' => 'keuntungan3.png', 'title' => 'Tersedia spotlight mode', 'desc' => 'Foto lebih fokus dan menarik dengan pencahayaan khusus']
            ] as $benefit)
                <div class="monogram-benefit-card card shadow-sm p-0 overflow-hidden" style="width: 300px; height: 420px; border-radius: 12px;">
                    <img src="{{ asset('assets/images/' . $benefit['image']) }}" alt="{{ $benefit['title'] }}"
                        class="benefit-img-fix w-100">
                    <div class="monogram-benefit-body card-body">
                        <h5 class="monogram-benefit-title card-title fw-bold mb-2">{{ $benefit['title'] }}</h5>
                        <p class="monogram-benefit-desc card-text text-muted">{{ $benefit['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

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

    <!-- Contact Form Ulasan -->
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

        <form action="{{ route('ulasan.store') }}" method="POST">
            @csrf
            <div class="monogram-input-group mb-3">
                <label for="name" class="form-label">Nama Pengguna</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="monogram-input form-control" placeholder="Nama">
            </div>
            <div class="monogram-textarea-group mb-3">
                <label for="ulasan" class="form-label">Ulasan <span class="text-danger">*</span></label>
                <textarea name="ulasan" id="ulasan" rows="5" required class="monogram-textarea form-control">{{ old('ulasan') }}</textarea>
            </div>
            <div class="monogram-submit-btn d-flex justify-content-start">
                <button type="submit" class="monogram-submit-btn btn btn-dark px-5 py-2">Kirim Ulasan</button>
            </div>
        </form>
    </div>

    {{-- Tampilkan Ulasan yang Disetujui --}}
    @if($ulasans->isNotEmpty())
    <div class="monogram-feedbacks-container mt-5">
        <div class="monogram-feedbacks">
            <div class="monogram-feedbacks-title-wrapper">
                <h3 class="monogram-feedbacks-title mb-4">Apa Kata Mereka?</h3>
                <div class="monogram-feedbacks-line"></div>
            </div>
            <div class="monogram-feedbacks-wrapper">
                @foreach($ulasans as $ulasan)
                    <div class="monogram-feedback-card">
                        <div class="card-body">
                            <p class="monogram-feedback-quote">{{ $ulasan->ulasan }}</p>
                            <p class="monogram-feedback-name">- {{ $ulasan->name ?? 'Anonim' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
@endsection
