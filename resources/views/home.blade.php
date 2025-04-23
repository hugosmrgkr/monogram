@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section - Full Width -->
    <br><br><br>
    <div class="monogram-container mb-4">
        <h1 class="monogram-title fw-bold">MONOGRAM TOBA</h1>
        <p class="monogram-subtitle">Welcome to website Monogram Studio Balige</p>
    </div>
    <div class="monogram-hero-section position-relative mb-4">
        <div class="container-fluid p-0">
            <img src="{{ asset('assets/images/home.png') }}" alt="Monogram Toba Studio" class="monogram-hero-img img-fluid w-100" style="max-height: 600px; object-fit: cover;">
            <div class="monogram-hero-text position-absolute top-50 start-50 translate-middle text-white text-center">
                <h1 class="monogram-hero-title">>monogram_</h1>
            </div>
        </div>
    </div>

    <!-- Section Berita Terkini -->
    <div class="container my-5">
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
</div>

    <!-- Benefits Section -->
    <div class="monogram-benefits-section container py-5 bg-white">
        <h2 class="monogram-benefits-title text-black fw-bold mb-4">Keuntungan</h2>
        <div class="monogram-benefits-container d-flex gap-4 flex-wrap">
            @foreach ([
                ['image' => 'keuntungan1.png', 'title' => 'Pilihan Tata Letak Hasil Foto', 'desc' => 'Pilih Tata letak foto sesuai keinginanmu'],
                ['image' => 'keuntungan2.png', 'title' => 'BEBAS WARNA LATAR FOTO', 'desc' => 'Pilih warna latar sesuai keinginanmu'],
                ['image' => 'keuntungan3.png', 'title' => 'Tersedia spotlight mode', 'desc' => '']
            ] as $benefit)
                <div class="monogram-benefit-card card" style="width: 300px;">
                    <img src="{{ asset('assets/images/' . $benefit['image']) }}" alt="{{ $benefit['title'] }}" class="monogram-benefit-img card-img-top rounded-3 mb-3">
                    <div class="monogram-benefit-body card-body">
                        <h5 class="monogram-benefit-title card-title fw-bold mb-2">{{ $benefit['title'] }}</h5>
                        <p class="monogram-benefit-desc card-text text-muted">{{ $benefit['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Recommended Photos Section -->
    <div class="monogram-gallery-section container mb-5">
        <h2 class="monogram-gallery-title fw-bold mb-4">Recommended Foto</h2>
        <div class="row monogram-gallery-row g-4 justify-content-center">
            @forelse($galleries as $gallery)
                <div class="col-md-3 col-6">
                    <div class="monogram-gallery-card card border-0 shadow-sm">
                        <img src="{{ asset('uploads/' . $gallery->gambar) }}" class="monogram-gallery-img card-img-top img-fluid" alt="Rekomendasi Foto">
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Belum ada foto rekomendasi.</p>
                </div>
            @endforelse
        </div>
        <div class="monogram-gallery-btn text-center mt-4">
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
                <input type="text" name="name" class="form-control" placeholder="Nama Anda" required>
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
        <div class="monogram-feedbacks mt-5">
            <h3 class="monogram-feedbacks-title mb-4">Apa Kata Mereka?</h3>
            <div class="monogram-feedbacks-container d-flex flex-wrap gap-4">
                @foreach($ulasans as $ulasan)
                    <div class="monogram-feedback-card card shadow-sm" style="width: 400px; background-color: #f8f9fa;">
                        <div class="card-body">
                            <p class="monogram-feedback-quote card-text italic">"{{ $ulasan->ulasan }}"</p>
                            <p class="monogram-feedback-name text-end mb-0 fw-bold">- {{ $ulasan->name ?? 'Anonim' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection
