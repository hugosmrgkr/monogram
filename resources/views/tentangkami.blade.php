@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/tentangkami.css') }}">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
@endsection

@section('content')
{{-- HERO ABOUT --}}
<section class="about-hero-section position-relative mb-5" data-aos="fade-down" data-aos-duration="1200">
    <div class="about-hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
    <div class="about-hero-text position-absolute top-50 start-50 translate-middle text-center text-white px-3">
        <h1 class="display-4 fw-bold mb-3" style="font-family: Inter, sans-serif;" data-aos="fade-up" data-aos-delay="300">
            Tentang >MONOGRAM_
        </h1>
        <p data-aos="fade-up" data-aos-delay="600">
            Selami kisah, visi, dan layanan kami yang telah dipercaya banyak klien untuk momen terbaik mereka.
        </p>
    </div>
</section>

<div class="container">
    {{-- DESKRIPSI STUDIO --}}
    <div class="studio-description mb-5" data-aos="fade-up" data-aos-duration="1200">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center" data-aos="zoom-in" data-aos-duration="1000">
                <h2 class="studio-title mb-4">Profil & Layanan Studio</h2>
            </div>
            <div class="col-lg-8 mx-auto studio-text" data-aos="fade-up" data-aos-duration="1200">
                <p>Monogram Toba Studio didirikan pada 17 Agustus 2022 di Lumban Dolok Haume Bange, Kec. Balige, Toba, Sumatera Utara, Indonesia, sebagai tempat fotografi yang mengutamakan kualitas dan kenyamanan.</p>

                <p>Kami melayani berbagai sesi foto, seperti foto sendiri (portrait), foto wisuda, foto bersama teman, serta sesi dengan berbagai gaya dan konsep. Dengan sentuhan profesional dari fotografer berpengalaman, setiap momen spesial akan diabadikan dengan hasil terbaik.</p>

                <p>Kami menyediakan berbagai fasilitas, termasuk background beragam, pencahayaan profesional, properti pendukung, serta layanan editing dan cetak foto. Selain itu, tersedia juga berbagai pilihan snack dan minuman yang bisa dinikmati sebelum atau sesudah sesi foto, menambah kenyamanan selama berada di studio.</p>

                <p>Setiap detail dalam studio kami dirancang untuk memberikan pengalaman yang menyenangkan dan hasil yang memuaskan. Kami percaya bahwa fotografi bukan hanya sekadar gambar, tetapi juga tentang menangkap cerita di setiap momen yang berharga.</p>

                <p>Kami juga selalu terbuka untuk berbagai konsep pemotretan, mulai dari foto formal hingga sesi kasual yang lebih santai, sesuai dengan keinginan pelanggan. Dengan berbagai pilihan properti dan latar yang dapat disesuaikan, setiap foto yang diambil akan memiliki karakter unik dan estetika yang memikat.</p>
            </div>
        </div>
    </div>

    {{-- GALERI STUDIO --}}
    <div class="studio-gallery mb-5">
        <div class="row g-4 foot-gallery">
            <div class="col-md-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/Foot1.png') }}" class="img-fluid rounded">
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left" data-aos-duration="1000">
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/Foot2.png') }}" class="img-fluid rounded">
                </div>
            </div>
        </div>
        <div class="row g-4 mt-3">
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/tentangCard1.png') }}" class="img-fluid rounded">
                </div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/tentangCard2.png') }}" class="img-fluid rounded">
                </div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/tentangCard3.png') }}" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

    {{-- INFORMASI TOKO --}}
    @forelse ($tentangKami as $about)
        @if (!empty($about->jam_buka_hari_biasa) || !empty($about->jam_buka_akhir_pekan))
            <div class="informasi-toko container my-5" data-aos="fade-up" data-aos-duration="1200">
                <h3 class="section-title text-center mb-4">Jam Operasional</h3>
                <p class="section-desc text-center mb-4">Kami siap melayani Anda setiap hari...</p>
                <div class="table-responsive" data-aos="zoom-in" data-aos-delay="100">
                    <table class="table-jam table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Hari</th>
                                <th>Jam Buka</th>
                                <th>Jam Tutup</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($about->jam_buka_hari_biasa) && !empty($about->jam_tutup_hari_biasa))
                                <tr>
                                    <td>Senin - Sabtu</td>
                                    <td>{{ \Carbon\Carbon::parse($about->jam_buka_hari_biasa)->format('H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($about->jam_tutup_hari_biasa)->format('H:i') }}</td>
                                </tr>
                            @endif
                            @if (!empty($about->jam_buka_akhir_pekan) && !empty($about->jam_tutup_akhir_pekan))
                                <tr>
                                    <td>Minggu</td>
                                    <td>{{ \Carbon\Carbon::parse($about->jam_buka_akhir_pekan)->format('H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($about->jam_tutup_akhir_pekan)->format('H:i') }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="hubungi-kami mt-5 text-center" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="section-title mb-3">Hubungi Kami</h3>
                    <p class="section-text">+62 82268691532</p>
                    <div class="d-flex justify-content-center gap-3 flex-wrap mt-3">
                        @if (!empty($about->kontak_wa))
                            <a href="{{ $about->kontak_wa }}" target="_blank" class="btn btn-wa">WhatsApp</a>
                        @endif
                        @if (!empty($about->kontak_ig))
                            <a href="{{ $about->kontak_ig }}" target="_blank" class="btn btn-ig">Instagram</a>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    @empty
        <div class="text-center my-5" data-aos="fade-in">
            <h3>Belum ada Data About</h3>
        </div>
    @endforelse
</div>

<!-- AOS JS & Init -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        AOS.init({
            easing: 'ease-out-cubic',
            once: true,
            duration: 800,
        });
    });
</script>
@endsection
