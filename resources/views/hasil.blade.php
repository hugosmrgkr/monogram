@extends('layouts.app')

@section('title', 'Foto Wisuda - Monogram Toba Studio')

@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
@endsection

@section('content')
    <!-- Header Section -->

    
    <div class="container-header">
        <div class="logo">
        <a href="{{ route('home') }}" class="logo-text">>MONOGRAM_</a>

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