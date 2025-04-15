@extends('layouts.app')

@section('title', '{{ ucfirst($kategori) }} - Monogram Toba Studio')

@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
@endsection

@section('content')
    <!-- Header Section -->
    <div class="container-header">
        <div class="logo">
            <a href="{{ route('home') }}" class="logo-text">>MONOGRAM_</a>
        </div>
        <div class="nav-links">
            <div class="nav-item">Beranda</div>
            <div class="nav-menu">
                <a href="{{ route('hasil', ['kategori' => 'wisuda']) }}" class="nav-button {{ $kategori == 'wisuda' ? 'active' : '' }}">1</a>
                <a href="{{ route('hasil', ['kategori' => 'pasangan']) }}" class="nav-button {{ $kategori == 'pasangan' ? 'active' : '' }}">2</a>
                <a href="{{ route('hasil', ['kategori' => 'pertemanan']) }}" class="nav-button {{ $kategori == 'pertemanan' ? 'active' : '' }}">3</a>
                <a href="{{ route('hasil', ['kategori' => 'keluarga']) }}" class="nav-button {{ $kategori == 'keluarga' ? 'active' : '' }}">4</a>
            </div>
        </div>
        <div class="title-button">FOTO {{ strtoupper($kategori) }}</div>
    </div>

    <!-- Gallery Section -->
    <div class="gallery-container">
        @if($kategori == 'wisuda')
            <div class="gallery-grid">
                <img src="{{ asset('assets/images/wisuda/foto1.png') }}" class="gallery-item" alt="Foto Wisuda">
                <img src="{{ asset('assets/images/wisuda/foto2.png') }}" class="gallery-item" alt="Foto Wisuda">
                <img src="{{ asset('assets/images/wisuda/foto3.png') }}" class="gallery-item" alt="Foto Wisuda">
                <img src="{{ asset('assets/images/wisuda/foto4.png') }}" class="gallery-item" alt="Foto Wisuda">
                <img src="{{ asset('assets/images/wisuda/foto5.png') }}" class="gallery-item" alt="Foto Wisuda">
                <img src="{{ asset('assets/images/wisuda/foto6.png') }}" class="gallery-item" alt="Foto Wisuda">
                <img src="{{ asset('assets/images/wisuda/foto7.png') }}" class="gallery-item" alt="Foto Wisuda">
                <img src="{{ asset('assets/images/wisuda/foto8.png') }}" class="gallery-item" alt="Foto Wisuda">
            </div>
            <div class="gallery-footer">
                "SIMPAN MOMENT WISUDA MU BERSAMA ORANG TERKASIH MELALUI LENSA MONOGRAM TOBA STUDIO"
            </div>
        @elseif($kategori == 'pasangan')
            <div class="gallery-grid">
                <img src="{{ asset('assets/images/pasangan/foto1.png') }}" class="gallery-item" alt="Foto Pasangan">
                <img src="{{ asset('assets/images/pasangan/foto2.png') }}" class="gallery-item" alt="Foto Pasangan">
                <img src="{{ asset('assets/images/pasangan/foto3.png') }}" class="gallery-item" alt="Foto Pasangan">
                <img src="{{ asset('assets/images/pasangan/foto4.png') }}" class="gallery-item" alt="Foto Pasangan">
                <img src="{{ asset('assets/images/pasangan/foto5.png') }}" class="gallery-item" alt="Foto Pasangan">
                <img src="{{ asset('assets/images/pasangan/foto6.png') }}" class="gallery-item" alt="Foto Pasangan">
                <img src="{{ asset('assets/images/pasangan/foto7.png') }}" class="gallery-item" alt="Foto Pasangan">
                <img src="{{ asset('assets/images/pasangan/foto8.png') }}" class="gallery-item" alt="Foto Pasangan">
            </div>
            <div class="gallery-footer">
                "ABADIKAN MOMEN INDAH BERSAMA PASANGAN ANDA MELALUI LENSA MONOGRAM TOBA STUDIO"
            </div>
        @elseif($kategori == 'pertemanan')
            <div class="gallery-grid">
                <img src="{{ asset('assets/images/pertemanan/foto1.png') }}" class="gallery-item" alt="Foto Pertemanan">
                <img src="{{ asset('assets/images/pertemanan/foto2.png') }}" class="gallery-item" alt="Foto Pertemanan">
                <img src="{{ asset('assets/images/pertemanan/foto3.png') }}" class="gallery-item" alt="Foto Pertemanan">
                <img src="{{ asset('assets/images/pertemanan/foto4.png') }}" class="gallery-item" alt="Foto Pertemanan">
                <img src="{{ asset('assets/images/pertemanan/foto5.png') }}" class="gallery-item" alt="Foto Pertemanan">
                <img src="{{ asset('assets/images/pertemanan/foto6.png') }}" class="gallery-item" alt="Foto Pertemanan">
                <img src="{{ asset('assets/images/pertemanan/foto7.png') }}" class="gallery-item" alt="Foto Pertemanan">
                <img src="{{ asset('assets/images/pertemanan/foto8.png') }}" class="gallery-item" alt="Foto Pertemanan">
            </div>
            <div class="gallery-footer">
                "RAYAKAN PERSAHABATAN DAN KEBERSAMAAN DENGAN FOTO PERTEMANAN DARI MONOGRAM TOBA STUDIO"
            </div>
        @elseif($kategori == 'keluarga')
            <div class="gallery-grid">
                <img src="{{ asset('assets/images/keluarga/foto1.png') }}" class="gallery-item" alt="Foto Keluarga">
                <img src="{{ asset('assets/images/keluarga/foto2.png') }}" class="gallery-item" alt="Foto Keluarga">
                <img src="{{ asset('assets/images/keluarga/foto3.png') }}" class="gallery-item" alt="Foto Keluarga">
                <img src="{{ asset('assets/images/keluarga/foto4.png') }}" class="gallery-item" alt="Foto Keluarga">
                <img src="{{ asset('assets/images/keluarga/foto5.png') }}" class="gallery-item" alt="Foto Keluarga">
                <img src="{{ asset('assets/images/keluarga/foto6.png') }}" class="gallery-item" alt="Foto Keluarga">
                <img src="{{ asset('assets/images/keluarga/foto7.png') }}" class="gallery-item" alt="Foto Keluarga">
                <img src="{{ asset('assets/images/keluarga/foto8.png') }}" class="gallery-item" alt="Foto Keluarga">
            </div>
            <div class="gallery-footer">
                "CIPTAKAN KENANGAN INDAH BERSAMA KELUARGA TERCINTA MELALUI LENSA MONOGRAM TOBA STUDIO"
            </div>
        @endif
    </div>
@endsection