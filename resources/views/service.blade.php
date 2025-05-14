@extends('layouts.app')
@section('title', 'Layanan')
@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/service.css') }}">
    <!-- Add AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
@endsection
@section('content')
<div class="service-hero" data-aos="fade-in" data-aos-duration="1200">
    <div class="service-overlay"></div>
    <div class="service-text-container">
        <h1 class="service-title" data-aos="fade-up" data-aos-delay="300">Layanan Monogram</h1>
        <p data-aos="fade-up" data-aos-delay="500">Subheading with description of your shopping site</p>
    </div>
</div>
<div class="service-section" data-aos="fade-up" data-aos-duration="800" data-aos-offset="200">
    <div class="service-card" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="1000">
        <img class="service-image" src="/assets/images/keuntungan2.png" alt="Studio Monogram" />
        <div class="service-info">
            <div class="service-description" data-aos="fade-right" data-aos-delay="600">
                15 minutes photoshoot<br>
                - 2 people<br>
                - 2 photo printing (3R)<br>
                - all soft files (Google Drive link expires in 7 days)
            </div>
            <div class="service-price" data-aos="fade-left" data-aos-delay="800">75K</div>
        </div>
    </div>
</div>
<section class="additional-section">
    <div class="additional-container">
        <h2 class="section-title" data-aos="fade-up" data-aos-offset="200">Additional</h2>
        <div class="layanan-wrapper">
            @forelse($layanans as $layanan)
                <div class="layanan-card" data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ $loop->index * 100 }}">
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
                <p class="no-layanan-msg" data-aos="fade-in">Belum ada layanan tersedia saat ini.</p>
            @endforelse
        </div>
        <div class="booking-btn-container" data-aos="fade-up" data-aos-offset="100" data-aos-duration="1000">
            <a href="https://monogram.youcanbook.me/" target="_blank" class="booking-btn">Book now</a>
        </div>
        <div class="photo-importance" data-aos="fade-up" data-aos-offset="150" data-aos-duration="900">
            <h2 class="section-title" data-aos="fade-up" data-aos-delay="200">Kenapa Cetak Foto Masih Penting?</h2>
            <p class="importance-text" data-aos="fade-up" data-aos-delay="400">
                Di era serba digital, foto seringkali hanya disimpan di ponsel atau cloud — dan bisa hilang kapan saja.
                Mencetak foto adalah cara menjaga kenangan tetap nyata. 
                <strong>Foto cetak bisa dipajang, disimpan, atau diwariskan</strong> ke generasi berikutnya.
            </p>
            <p class="importance-text" data-aos="fade-up" data-aos-delay="600">
                Saat kamu melihat foto di dinding atau dalam album, kamu tidak hanya melihat gambar — kamu menghidupkan kembali momen spesial di dalamnya.
                Itulah kekuatan cetak: <em>abadi, nyata, dan penuh makna.</em>
            </p>
        </div>
    </div>
</section>

<!-- Add AOS JS script and initialization -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            easing: 'ease-out-cubic',
            once: true,
            duration: 800,
        });
    });
</script>
@endsection