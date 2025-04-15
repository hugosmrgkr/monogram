@extends('layouts.app')

@section('title', '{{ ucfirst($kategori) }} - Monogram Toba Studio')

@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

        <!-- Card view -->
        <div class="row justify-content-center my-4">
            @forelse($data as $item)
                <div class="card m-2" style="width: 18rem;">
                    <img src="{{ asset('uploads/' . $item->gambar) }}" class="card-img-top" alt="Foto {{ $kategori }}">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title dan bisa kamu ganti sesuai deskripsi.</p>
                    </div>
                </div>
            @empty
                <div class="no-photo text-center mt-5">
                    <img src="{{ asset('img/empty-gallery.png') }}" alt="No photos" class="no-photo-img">
                    <p class="no-photo-text">Belum ada foto untuk kategori ini. Yuk jadi yang pertama!</p>
                </div>
            @endforelse
        </div>

        <!-- Gallery Footer -->
        <div class="gallery-footer text-center mt-4">
            "SIMPAN MOMENT {{ strtoupper($kategori) }} MU BERSAMA ORANG TERKASIH MELALUI LENSA MONOGRAM TOBA STUDIO"
        </div>
    </div>


    <!-- Back to Home Button -->
    <div class="text-center mb-5 mt-4">
        <a href="{{ route('home') }}" class="btn btn-dark rounded-0 px-5 py-2">Kembali ke Beranda</a>
    </div>
@endsection
