@extends('layouts.app')

@section('title', 'Foto Wisuda - Monogram Toba Studio')

@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
@endsection

@section('content')
    <!-- Header Section -->

    <style>
        /* Global Styles */
body {
    font-family: 'Inter', sans-serif;
    color: black;
    background-color: white;
}

/* Header Styles */
.container-header {
    width: 100%;
    height: 164px;
    background: white;
    position: relative;
    overflow: hidden;
}

.logo {
    position: absolute;
    left: 34px;
    top: 48px;
    font-size: 20px;
    font-weight: 500;
    line-height: 30px;
}

.logo-text {
    filter: blur(4px);
}

.nav-menu {
    position: absolute;
    right: 34px;
    top: 56px;
    display: flex;
    align-items: center;
    gap: 48px;
}

.nav-item {
    font-size: 20px;
    font-weight: 500;
    line-height: 30px;
}

.nav-button {
    padding: 14px 24px;
    border-radius: 8px;
    font-size: 20px;
    font-weight: 500;
    box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.05);
    border: none;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    text-align: center;
}

.nav-button.active {
    background-color: black;
    color: white;
}

.nav-button:not(.active) {
    background-color: white;
    color: black;
}

.title-button {
    width: 186px;
    padding: 12px 24px;
    background: black;
    color: white;
    font-size: 20px;
    font-weight: 500;
    border-radius: 8px;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    top: 92px;
    text-align: center;
    box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.05);
}

/* Gallery Styles */
.gallery-container {
    width: 100%;
    padding: 0 34px;
    margin-top: 25px;
}

.gallery-row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 25px;
    justify-content: center;
}

.gallery-item-large {
    width: 360px;
    height: 360px;
    object-fit: cover;
    border-radius: 4px;
}

.gallery-item-medium {
    width: 270px;
    height: 360px;
    object-fit: cover;
    border-radius: 4px;
}

.gallery-footer {
    text-align: center;
    margin: 50px 0;
    font-size: 20px;
    font-weight: 500;
    line-height: 30px;
    padding: 0 20px;
}

/* Responsive Adjustments */
@media (max-width: 1200px) {
    .gallery-row {
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .nav-menu {
        position: relative;
        right: auto;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
        margin-top: 10px;
    }
    
    .logo {
        position: relative;
        left: auto;
        text-align: center;
        width: 100%;
    }
    
    .title-button {
        position: relative;
        left: auto;
        transform: none;
        margin: 15px auto;
        display: block;
    }
    
    .container-header {
        height: auto;
        padding: 20px 0;
    }
    
    .gallery-item-large, .gallery-item-medium {
        width: 100%;
        height: auto;
        aspect-ratio: 3/4;
    }
}

/* Bootstrap Overrides */
.rounded-0 {
    border-radius: 0 !important;
}

.btn-dark {
    background-color: black;
    border-color: black;
}

.btn-dark:hover {
    background-color: #333;
}

/* Additional Customizations */
.img-fluid.rounded {
    border-radius: 4px !important;
    margin-bottom: 15px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.img-fluid.rounded:hover {
    transform: scale(1.02);
}

.fw-bold {
    font-weight: 500 !important;
}

/* Tombol Kembali */
.text-center.mb-5 {
    margin-top: 30px;
}

.text-center.mb-5 a {
    transition: background-color 0.3s ease;
    font-weight: 500;
}

.text-center.mb-5 a:hover {
    background-color: #333;
}
    </style>
    <div class="container-header">
        <div class="logo">
            <span class="logo-text">MONOGRAM_</span>
        </div>
        <div class="nav-menu">
            <a href="{{ route('hasil', ['kategori' => 'wisuda']) }}" class="nav-button {{ $kategori == 'wisuda' ? 'active' : '' }}">1</a>
            <a href="{{ route('hasil', ['kategori' => 'pasangan']) }}" class="nav-button {{ $kategori == 'pasangan' ? 'active' : '' }}">2</a>
            <a href="{{ route('hasil', ['kategori' => 'pertemanan']) }}" class="nav-button {{ $kategori == 'pertemanan' ? 'active' : '' }}">3</a>
            <a href="{{ route('hasil', ['kategori' => 'keluarga']) }}" class="nav-button {{ $kategori == 'keluarga' ? 'active' : '' }}">4</a>
        </div>
        <div class="title-button">FOTO WISUDA</div>
    </div>

    <!-- Gallery Section -->
    <div class="gallery-container">
        <div class="gallery-row">
            <img src="{{ asset('assets/images/foto1.png') }}" class="gallery-item-large" alt="Foto Wisuda">
            <img src="{{ asset('assets/images/foto2.png') }}" class="gallery-item-medium" alt="Foto Wisuda">
            <img src="{{ asset('assets/images/foto3.png') }}" class="gallery-item-medium" alt="Foto Wisuda">
            <img src="{{ asset('assets/images/foto4.png') }}" class="gallery-item-medium" alt="Foto Wisuda">
        </div>
        <div class="gallery-row">
            <img src="{{ asset('assets/images/foto5.png') }}" class="gallery-item-medium" alt="Foto Wisuda">
            <img src="{{ asset('assets/images/foto6.png') }}" class="gallery-item-medium" alt="Foto Wisuda">
            <img src="{{ asset('assets/images/foto7.png') }}" class="gallery-item-large" alt="Foto Wisuda">
            <img src="{{ asset('assets/images/foto8.png') }}" class="gallery-item-medium" alt="Foto Wisuda">
        </div>
        <div class="gallery-footer">
            "SIMPAN MOMENT WISUDA MU BERSAMA ORANG TERKASIH MELALUI LENSA MONOGRAM TOBA STUDIO"
        </div>
    </div>

    <!-- Tombol Kembali ke Beranda -->
    <div class="text-center mb-5">
        <a href="{{ route('home') }}" class="btn btn-dark rounded-0 px-5 py-2">Kembali ke Beranda</a>
    </div>
@endsection