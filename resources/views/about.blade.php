@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('content')
{{-- HERO ABOUT --}}
<section class="about-hero-section position-relative mb-5">
    <div class="about-hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
    <div class="about-hero-text position-absolute top-50 start-50 translate-middle text-center text-white px-3">
      <h1 class="display-4 fw-bold mb-3" style="font-family: Inter, sans-serif;">
        Tentang Monogram Studio
      </h1>
      <p class="lead" style="font-size: 1.25rem; font-family: Inter, sans-serif;">
        Selami kisah, visi, dan layanan kami yang telah dipercaya banyak klien untuk momen terbaik mereka.
      </p>
    </div>
</section>

<div class="container">
    {{-- DESKRIPSI STUDIO --}}
    <div class="studio-description mb-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <p class="fw-500">Monogram Toba Studio didirikan pada 17 Agustus 2022 di Lumban Dolok Haume Bange, Kec. Balige, Toba, Sumatera Utara, Indonesia, sebagai tempat fotografi yang mengutamakan kualitas dan kenyamanan.</p>
                
                <p class="fw-500">Kami melayani berbagai sesi foto, seperti foto sendiri (portrait), foto wisuda, foto bersama teman, serta sesi dengan berbagai gaya dan konsep. Dengan sentuhan profesional dari fotografer berpengalaman, setiap momen spesial akan diabadikan dengan hasil terbaik.</p>
                
                <p class="fw-500">Kami menyediakan berbagai fasilitas, termasuk background beragam, pencahayaan profesional, properti pendukung, serta layanan editing dan cetak foto. Selain itu, tersedia juga berbagai pilihan snack dan minuman yang bisa dinikmati sebelum atau sesudah sesi foto, menambah kenyamanan selama berada di studio. Dengan perpaduan suasana santai dan pelayanan terbaik, Monogram Toba Studio menjadi pilihan ideal untuk setiap kebutuhan fotografi Anda.</p>
                
                <p class="fw-500">Setiap detail dalam studio kami dirancang untuk memberikan pengalaman yang menyenangkan dan hasil yang memuaskan. Kami percaya bahwa fotografi bukan hanya sekadar gambar, tetapi juga tentang menangkap cerita di setiap momen yang berharga. Dengan teknologi terkini dan kreativitas tanpa batas, kami menghadirkan hasil foto yang tajam, artistik, dan penuh makna.</p>
                
                <p class="fw-500">Kami juga selalu terbuka untuk berbagai konsep pemotretan, mulai dari foto formal hingga sesi kasual yang lebih santai, sesuai dengan keinginan pelanggan. Dengan berbagai pilihan properti dan latar yang dapat disesuaikan, setiap foto yang diambil akan memiliki karakter unik dan estetika yang memikat.</p>
            </div>
        </div>
    </div>

    {{-- GALERI STUDIO --}}
    <div class="studio-gallery mb-5">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/studio-1.jpg') }}" alt="Studio Monogram" class="img-fluid rounded">
                </div>
            </div>
            <div class="col-md-6">
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/studio-2.jpg') }}" alt="Studio Monogram" class="img-fluid rounded">
                </div>
            </div>
        </div>
        <div class="row g-4 mt-3">
            <div class="col-md-4">
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/studio-3.jpg') }}" alt="Studio Monogram" class="img-fluid rounded">
                </div>
            </div>
            <div class="col-md-4">
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/studio-4.jpg') }}" alt="Studio Monogram" class="img-fluid rounded">
                </div>
            </div>
            <div class="col-md-4">
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/studio-5.jpg') }}" alt="Studio Monogram" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

    @forelse ($abouts as $about)
        {{-- JAM OPERASIONAL --}}
        @if (!empty($about->weekday_open) || !empty($about->weekend_open))
        <div class="text-center my-5">
            <h3 style="font-size: 32px; font-weight: 700;">Jam Operasional</h3>
            @if (!empty($about->weekday_open) && !empty($about->weekday_close))
                <p style="font-size: 20px;">
                    Senin - Sabtu : {{ \Carbon\Carbon::parse($about->weekday_open)->format('H:i') }} - {{ \Carbon\Carbon::parse($about->weekday_close)->format('H:i') }}
                </p>
            @endif
            @if (!empty($about->weekend_open) && !empty($about->weekend_close))
                <p style="font-size: 20px;">
                    Minggu : {{ \Carbon\Carbon::parse($about->weekend_open)->format('H:i') }} - {{ \Carbon\Carbon::parse($about->weekend_close)->format('H:i') }}
                </p>
            @endif
        </div>
        @endif

        {{-- HUBUNGI KAMI --}}
        <div class="text-center mb-5">
            <h3 style="font-size: 32px; font-weight: 700;">Hubungi Kami</h3>
            <p class="mb-3" style="font-size: 20px; font-weight: 500;">+62 82268691532</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap mt-3">
                @if (!empty($about->kontak_wa))
                    <a href="{{ $about->kontak_wa }}" target="_blank" class="btn btn-success">WhatsApp</a>
                @endif
                @if (!empty($about->kontak_ig))
                    <a href="{{ $about->kontak_ig }}" target="_blank" class="btn btn-primary">Instagram</a>
                @endif
            </div>
        </div>
    @empty
        <div class="text-center my-5">
            <h3>Belum ada Data About</h3>
        </div>
    @endforelse

   


@endsection