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
        <h1 class="service-title">Layanan Monogram</h1>
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
            <a href="https://monogram.youcanbook.me/" target="_blank" class="booking-btn">Book now</a>
        </div>

        <div class="photo-importance">
    <h2 class="section-title">Kenapa Cetak Foto Masih Penting?</h2>
    <p class="importance-text">
        Di era serba digital, foto seringkali hanya disimpan di ponsel atau cloud — dan bisa hilang kapan saja.
        Mencetak foto adalah cara menjaga kenangan tetap nyata. 
        <strong>Foto cetak bisa dipajang, disimpan, atau diwariskan</strong> ke generasi berikutnya.
    </p>
    <p class="importance-text">
        Saat kamu melihat foto di dinding atau dalam album, kamu tidak hanya melihat gambar — kamu menghidupkan kembali momen spesial di dalamnya.
        Itulah kekuatan cetak: <em>abadi, nyata, dan penuh makna.</em>
    </p>
</div>

    </div>
</section>


@endsection
