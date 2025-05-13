@extends('layouts.app')

@section('title', 'Layanan')

@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/service.css') }}">
@endsection

@section('content')

<div class="service-hero">
    <div class="service-overlay"></div>
    <div class="service-text-container">
        <h1>Layanan Monogram</h1>
        <p>Subheading with description of your shopping site</p>
    </div>
</div>

<div class="service-section">
    <div class="service-card">
        <img class="service-image" src="/assets/images/keuntungan2.png" alt="Studio Monogram" />
        <div class="service-info">
            <div class="service-description">
                15 minutes photoshoot<br>
                - 2 people<br>
                - 2 photo printing (3R)<br>
                - all soft files (Google Drive link expires in 7 days)
            </div>
            <div class="service-price">75K</div>
        </div>
    </div>
</div>

<section class="additional-section">
    <div class="additional-container">
        <h2 class="section-title">Additional</h2>

        <div class="layanan-wrapper">
            @forelse($layanans as $layanan)
                <div class="layanan-card">
                    <div class="layanan-card-inner">
                        @if($layanan->gambar)
                            <img src="{{ asset('storage/' . $layanan->gambar) }}" alt="{{ $layanan->judul }}" class="layanan-img">
                        @else
                            <div class="layanan-img-placeholder"></div>
                        @endif

                        <h3 class="layanan-title">{{ $layanan->judul }}</h3>
                        <p class="layanan-desc">{{ $layanan->keterangan }}</p>
                    </div>
                </div>
            @empty
                <p class="no-layanan-msg">Belum ada layanan tersedia saat ini.</p>
            @endforelse
        </div>

        <div class="booking-btn-container">
            <a href="https://monogram.youcanbook.me/" target="_blank" class="booking-btn">Booking now</a>
        </div>
    </div>
</section>

<section class="panggilan-section">
    <div class="panggilan-content">
        <div class="panggilan-text">
            <h2>Layanan Panggilan Fotografer</h2>
            <p>Kamu dapat memanggil fotografer keluar layanan yang disediakan:</p>
            <p>- Wisuda</p>
            <p>- Foto keluarga</p>
            <p>Jika berminat lanjut ke WA berikut:</p>
            <a href="https://wa.me/6282268691532" target="_blank" class="wa-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" viewBox="0 0 24 24">
                    <path d="..."/>
                </svg>
                +62 82268691532
            </a>
        </div>
    </div>

    <div class="panggilan-img photographer">
        <img src="{{ asset('images/photographer.png') }}" alt="Photographer">
    </div>

    <div class="panggilan-img camera">
        <img src="{{ asset('images/camera.png') }}" alt="Camera">
    </div>
</section>
@endsection
