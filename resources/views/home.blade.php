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


   <!-- Contact Form Ulasan -->
<div style="width: 100%; max-width: 1305px; padding: 24px; background: white; border-radius: 8px; outline: 1px solid #D9D9D9; outline-offset: -1px; display: flex; flex-direction: column; gap: 24px;">

@if(session('success'))
    <div style="padding: 12px 16px; background-color: #D1FAE5; color: #065F46; border-radius: 8px;">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div style="padding: 12px 16px; background-color: #FEE2E2; color: #991B1B; border-radius: 8px;">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('ulasan.store') }}" method="POST">
    @csrf

    {{-- Nama Pengguna (Opsional) --}}
    <div style="display: flex; flex-direction: column; gap: 8px;">
        <label style="font-family: Inter; font-size: 16px; color: #1E1E1E;">
            Nama Pengguna
        </label>
        <input type="text" name="name" value="{{ old('name') }}"
               style="padding: 12px 16px; font-family: Inter; font-size: 16px; color: #1E1E1E; background: white; border: 1px solid #D9D9D9; border-radius: 8px; outline: none; width: 100%; min-width: 240px;">
    </div>

    {{-- Ulasan (Wajib) --}}
    <div style="display: flex; flex-direction: column; gap: 8px;">
        <label style="font-family: Inter; font-size: 16px; color: #1E1E1E;">
            Ulasan <span style="color: #FF1818;">*</span>
        </label>
        <textarea name="ulasan" rows="5" required>{{ old('ulasan') }}</textarea>
    </div>

    {{-- Tombol Kirim --}}
    <div style="display: flex; justify-content: flex-start;">
        <button type="submit"
                style="padding: 12px; background-color: #2C2C2C; border: 1px solid #2C2C2C; border-radius: 8px; color: #F5F5F5; font-family: Inter; font-size: 16px; cursor: pointer; flex: 1;">
            Kirim Ulasan
        </button>
    </div>
</form>
</div>
{{-- Tampilkan Ulasan yang Disetujui --}}
@if($ulasans->isNotEmpty())
    <div class="mt-5">
        <h3 class="mb-4" style="font-family: Inter; font-weight: 700;">Apa Kata Mereka?</h3>
        <div style="display: flex; flex-wrap: wrap; gap: 24px;">
            @foreach($ulasans as $ulasan)
                <div style="background-color: #f8f9fa; padding: 16px; border-radius: 8px; width: 100%; max-width: 400px;">
                    <p style="margin: 0; font-style: italic;">"{{ $ulasan->ulasan }}"</p>
                    <p style="margin-top: 8px; font-weight: bold; text-align: right;">- {{ $ulasan->name ?? 'Anonim' }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endif


@endsection
