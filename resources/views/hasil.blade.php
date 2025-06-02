@extends('layouts.app')

@section('title', 'Hasil - Monogram Toba Studio')

@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection

@section('content')
<!-- Hero Gallery Section -->
<section class="hero-gallery" data-aos="fade-down" data-aos-duration="1200">
    <div class="hero-gallery-overlay"></div>
    <div class="hero-gallery-text">
        <h1 data-aos="fade-up" data-aos-delay="300">
            @switch($kategori)
                @case('wisuda')
                    Galeri Wisuda
                    @break
                @case('pasangan')
                    Galeri Pasangan
                    @break
                @case('pertemanan')
                    Galeri Pertemanan
                    @break
                @case('keluarga')
                    Galeri Keluarga
                    @break
                @case('lainnya')
                    Galeri Spesial Lainnya
                    @break
                @default
                    Galeri Foto
            @endswitch
        </h1>
        <p data-aos="fade-up" data-aos-delay="600">
            @switch($kategori)
                @case('wisuda')
                    Momen wisuda yang mengesankan, penuh kebanggaan dan haru, kami abadikan dalam bingkai profesional.
                    @break
                @case('pasangan')
                    Tampilkan kisah cintamu dalam potret yang elegan dan romantis, hanya di Monogram Toba Studio.
                    @break
                @case('pertemanan')
                    Abadikan tawa dan kebersamaan dalam jepretan yang hangat bersama sahabat terbaikmu.
                    @break
                @case('keluarga')
                    Setiap detik bersama keluarga adalah kenangan, dan kami siap mengabadikannya untukmu.
                    @break
                @case('lainnya')
                    Ragam sesi foto lainnya yang tetap tak kalah spesial untuk dikenang sepanjang masa.
                    @break
                @default
                    Abadikan momen terbaikmu bersama Monogram Toba Studio dengan hasil berkualitas dan penuh makna.
            @endswitch
        </p>
    </div>
</section>


    <!-- Gallery Section -->
    <div class="gallery-container">
        <!-- Card view -->
        <div class="row justify-content-center my-4 g-4">
            @forelse($data as $item)
                <div class="col-12 col-md-4 col-lg-3 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('storage/app/public/' . $item->gambar) }}" class="card-img-top" alt="Foto {{ $kategori }}">
                        <div class="card-body">
                            <p class="card-text text-center fw-medium">{{ $loop->iteration }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="no-photo text-center">
                    <p class="no-photo-text">Belum ada foto untuk kategori ini.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination Section -->
        @if ($data->hasPages())
            <div class="d-flex justify-content-center">
                {{ $data->links('pagination::bootstrap-5') }}
            </div>
        @endif

        <!-- Gallery Footer -->
        <div class="gallery-footer text-center mt-4">
            "SIMPAN MOMENT {{ strtoupper($kategori) }} MU BERSAMA ORANG TERKASIH MELALUI LENSA MONOGRAM TOBA STUDIO"
        </div>
    </div>

    <!-- Back to Home Button -->
    <div class="text-center mb-5 mt-5">
        <a href="{{ route('home') }}" class="btn btn-dark rounded-0 px-5 py-2">Kembali ke Beranda</a>
    </div>
@endsection
