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
            <h1 class="display-4 fw-bold mb-3" style="font-family: Inter, sans-serif;" data-aos="fade-up"
                data-aos-delay="300">
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
                    <p>Monogram Toba Studio didirikan pada 17 Agustus 2022 di Lumban Dolok Haume Bange, Kec. Balige, Toba,
                        Sumatera Utara, Indonesia, sebagai tempat fotografi yang mengutamakan kualitas dan kenyamanan.</p>

                    <p>Kami melayani berbagai sesi foto, seperti foto sendiri (portrait), foto wisuda, foto bersama teman,
                        serta sesi dengan berbagai gaya dan konsep. Dengan sentuhan profesional dari fotografer
                        berpengalaman, setiap momen spesial akan diabadikan dengan hasil terbaik.</p>

                    <p>Kami menyediakan berbagai fasilitas, termasuk background beragam, pencahayaan profesional, properti
                        pendukung, serta layanan editing dan cetak foto. Selain itu, tersedia juga berbagai pilihan snack
                        dan minuman yang bisa dinikmati sebelum atau sesudah sesi foto, menambah kenyamanan selama berada di
                        studio.</p>

                    <p>Setiap detail dalam studio kami dirancang untuk memberikan pengalaman yang menyenangkan dan hasil
                        yang memuaskan. Kami percaya bahwa fotografi bukan hanya sekadar gambar, tetapi juga tentang
                        menangkap cerita di setiap momen yang berharga.</p>

                    <p>Kami juga selalu terbuka untuk berbagai konsep pemotretan, mulai dari foto formal hingga sesi kasual
                        yang lebih santai, sesuai dengan keinginan pelanggan. Dengan berbagai pilihan properti dan latar
                        yang dapat disesuaikan, setiap foto yang diambil akan memiliki karakter unik dan estetika yang
                        memikat.</p>
                </div>
            </div>
        </div>

        {{-- GALERI STUDIO --}}
        <div class="studio-gallery mb-5">
            <div class="row g-4 foot-gallery">
                <div class="col-md-6">
                    <div class="gallery-item">
                        <img src="{{ asset('assets/images/Foot1.png') }}" class="img-fluid rounded">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="gallery-item">
                        <img src="{{ asset('assets/images/Foot2.png') }}" class="img-fluid rounded">
                    </div>
                </div>
            </div>

            <div class="gallery-description my-5" data-aos="fade-up" data-aos-duration="1000">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <p class="text-center gallery-text">
                            Di Monogram Toba Studio, kami menciptakan ruang fotografi yang menggabungkan estetika modern dan
                            kearifan lokal budaya Batak Toba.
                            Ruangan kami dirancang dengan pencahayaan alami dan buatan yang telah dioptimalkan untuk
                            menghasilkan foto terbaik dalam berbagai kondisi.
                            Dengan latar dan properti yang dapat disesuaikan, setiap sudut studio menawarkan kemungkinan
                            tidak terbatas untuk mengabadikan momen istimewa
                            Anda dengan sentuhan profesional yang khas.
                        </p>
                    </div>
                </div>
            </div>

            <!-- KODE BLADE DENGAN INLINE UTILITY CLASSES (BOOTSTRAP) -->
            <div class="studio-gallery container py-4">
                <div class="row g-4 mt-3">
                    <div class="col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-delay="100">
                        <div class="gallery-item shadow rounded overflow-hidden mb-3 position-relative">
                            <img src="{{ asset('assets/images/tentangCard1.png') }}"
                                class="img-fluid w-100 rounded transition-all"
                                style="height: 500px; object-fit: cover; transition: transform 0.3s ease, box-shadow 0.3s ease;"
                                onmouseover="this.style.transform='scale(1.02)'; this.parentElement.style.boxShadow='0 6px 15px rgba(0, 0, 0, 0.2)';"
                                onmouseout="this.style.transform='scale(1)'; this.parentElement.style.boxShadow='0 4px 10px rgba(0, 0, 0, 0.1)';"
                                alt="Foto Studio 1">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-delay="200">
                        <div class="gallery-item shadow rounded overflow-hidden mb-3 position-relative">
                            <img src="{{ asset('assets/images/tentangCard2.png') }}"
                                class="img-fluid w-100 rounded transition-all"
                                style="height: 500px; object-fit: cover; transition: transform 0.3s ease, box-shadow 0.3s ease;"
                                onmouseover="this.style.transform='scale(1.02)'; this.parentElement.style.boxShadow='0 6px 15px rgba(0, 0, 0, 0.2)';"
                                onmouseout="this.style.transform='scale(1)'; this.parentElement.style.boxShadow='0 4px 10px rgba(0, 0, 0, 0.1)';"
                                alt="Foto Studio 2">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-delay="300">
                        <div class="gallery-item shadow rounded overflow-hidden mb-3 position-relative">
                            <img src="{{ asset('assets/images/tentangCard3.png') }}"
                                class="img-fluid w-100 rounded transition-all"
                                style="height: 500px; object-fit: cover; transition: transform 0.3s ease, box-shadow 0.3s ease;"
                                onmouseover="this.style.transform='scale(1.02)'; this.parentElement.style.boxShadow='0 6px 15px rgba(0, 0, 0, 0.2)';"
                                onmouseout="this.style.transform='scale(1)'; this.parentElement.style.boxShadow='0 4px 10px rgba(0, 0, 0, 0.1)';"
                                alt="Foto Studio 3">
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAMBAHKAN SCRIPT INI DI BAGIAN BAWAH SEBELUM CLOSING BODY TAG UNTUK RESPONSIVENESS -->
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    function adjustImageHeight() {
                        const width = window.innerWidth;
                        const images = document.querySelectorAll('.gallery-item img');

                        let height = '500px';
                        if (width <= 1200) height = '450px';
                        if (width <= 992) height = '400px';
                        if (width <= 768) height = '350px';
                        if (width <= 576) height = '300px';
                        if (width <= 480) height = '250px';
                        if (width <= 375) height = '200px';

                        images.forEach(img => {
                            img.style.height = height;
                        });
                    }

                    // Jalankan saat halaman dimuat
                    adjustImageHeight();

                    // Jalankan saat ukuran window berubah
                    window.addEventListener('resize', adjustImageHeight);
                });
            </script>

            {{-- INFORMASI TOKO --}}
            @forelse ($tentangKami as $about)
                @if (!empty($about->jam_buka_hari_biasa) || !empty($about->jam_buka_akhir_pekan))
                    <div class="informasi-toko container my-5" data-aos="fade-up" data-aos-duration="1200">
                        <h3 class="section-title text-center mb-4">Jam Operasional Kami</h3>
                        <p class="section-desc text-center mb-4">Kami siap melayani Anda...</p>
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
                                    {{-- Menambahkan informasi hari Rabu tutup --}}
                                    <tr>
                                        <td>Rabu</td>
                                        <td>Tutup</td>
                                        <td>Tutup</td>
                                    </tr>
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