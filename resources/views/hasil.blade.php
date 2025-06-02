@extends('layouts.app')

@section('title', 'Hasil - Monogram Toba Studio')

@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
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
            <div class="col-12 col-md-4 col-lg-3 mb-4" 
                 data-aos="zoom-in" 
                 data-aos-duration="600" 
                 data-aos-delay="{{ ($loop->index % 12) * 100 }}">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/app/public/' . $item->gambar) }}" 
                         class="card-img-top" 
                         alt="Foto {{ $kategori }}">
                    <div class="card-body">
                        <p class="card-text text-center fw-medium">{{ $loop->iteration }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="no-photo text-center" data-aos="fade-up" data-aos-duration="800">
                <p class="no-photo-text">Belum ada foto untuk kategori ini.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination Section -->
    @if ($data->hasPages())
        <div class="d-flex justify-content-center" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
            {{ $data->links('pagination::bootstrap-5') }}
        </div>
    @endif

    <!-- Gallery Footer -->
    <div class="gallery-footer text-center mt-4" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
        "SIMPAN MOMENT {{ strtoupper($kategori) }} MU BERSAMA ORANG TERKASIH MELALUI LENSA MONOGRAM TOBA STUDIO"
    </div>
</div>

<!-- JQuery & AOS Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    // Initialize AOS
    $(document).ready(function() {
        AOS.init({
            once: true, // animations only happen once
            duration: 800, // default animation duration
            offset: 100, // offset (in px) from the original trigger point
            easing: 'ease-in-out',
        });

        // Refresh AOS on window resize
        $(window).on('resize', function() {
            AOS.refresh();
        });
    });
</script>

@endsection