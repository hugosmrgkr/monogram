@extends('layouts.app')

@section('title', 'Beranda')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
@endsection

@section('content')
    <!-- Hero Section - Full Width -->
    <section class="hero-section" data-aos="fade-down" data-aos-duration="1200">
        <div class="hero-overlay"></div>
        <div class="hero-text">
            <h1 data-aos="fade-up" data-aos-delay="300">>monogram_</h1>
            <p data-aos="fade-up" data-aos-delay="600">
                Selamat datang di website resmi Monogram Studio Balige.<br>
                Kami menyediakan layanan fotografi profesional dengan kualitas terbaik dan pengalaman tak terlupakan.
            </p>
        </div>
    </section>

    <!-- Section Berita Terkini -->
    <section class="news-header">
        <h2>Berita Terkini</h2>
        <p class="news-subtitle">
            Dapatkan update harian seputar kegiatan, pengumuman, dan informasi penting kami.
        </p>
    </section>

    <div class="news-navigation">
        {{-- Wrapper biru full width --}}
        <div class="news-wrapper" id="newsContainer">
            {{-- Tambahan kontainer untuk batasi lebar konten --}}
            <div class="news-inner">
                <div class="news-navigation-inner">
                    @forelse ($beritas as $index => $berita)
                        <div class="news-daily-card" data-index="{{ $index }}" style="{{ $index !== 0 ? 'display:none;' : '' }}">
                            @if($berita->gambar)
                                <div class="news-img">
                                    <img src="{{ asset('storage/app/public/' . $berita->gambar) }}" alt="Gambar Berita">
                                </div>
                            @endif
                            <div class="news-content">
                                <h3>{{ $berita->judul }}</h3>
                                <p>{{ Str::limit($berita->isi, 150, '...') }}</p>
                                <p class="news-date">
                                    Berlaku {{ \Carbon\Carbon::parse($berita->tanggal_mulai)->timezone('Asia/Jakarta')->format('d M Y') }}
                                    – {{ \Carbon\Carbon::parse($berita->tanggal_habis)->timezone('Asia/Jakarta')->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <p class="news-empty">Belum ada berita tersedia saat ini.</p>
                    @endforelse
                </div>

                @if($beritas->count() > 1)
                    <div class="news-buttons">
                        <button class="news-nav-btn" id="prevBtn">&#10094;</button>
                        <button class="news-nav-btn" id="nextBtn">&#10095;</button>
                    </div>
                @endif

                {{-- Tampilkan keterangan jika ada lebih dari satu berita --}}
                @if($beritas->count() > 1)
                    <div class="text-center mt-3">
                        <span id="newsIndexDisplay" class="badge bg-info">
                            1 dari {{ $beritas->count() }}
                        </span>
                    </div>
                @endif
            </div>
        </div>
    </div>


    <!-- Benefits Section -->
    <section class="monogram-benefits section-padding" style="background-color: rgba(0, 0, 0, 0.05); padding-top: 60px; padding-bottom: 60px;">
        <div class="container">
            <div class="row">

            <div class="col-12 text-center">
                <h2 class="mb-3">Keuntungan</h2>
                <p class="mb-5" style="color: #555; font-size: 1.05rem; max-width: 700px; margin: 0 auto;">
                    Monogram Studio memberikan berbagai keuntungan yang dapat kamu nikmati saat melakukan sesi foto.
                    Dari fleksibilitas pengaturan tata letak hingga pencahayaan eksklusif, semua kami siapkan demi hasil terbaik untukmu.
                </p>
            </div>

                @foreach ([
                    ['image' => 'keuntungan1.png', 'title' => 'Tata Letak Foto', 'desc' => 'Pilih tata letak foto sesuai keinginanmu', 'aos-delay' => '0'],
                    ['image' => 'keuntungan2.png', 'title' => 'Warna Latar Sesuai Keinginan', 'desc' => 'Pilih warna latar sesuai keinginanmu', 'aos-delay' => '200'],
                    ['image' => 'keuntungan3.png', 'title' => 'Mode Spotlight', 'desc' => 'Foto lebih fokus dengan pencahayaan khusus', 'aos-delay' => '400']
                ] as $benefit)
                    <div class="col-lg-4 col-12 mb-3">
                        <div class="product-thumb">
                            <img src="{{ asset('assets/images/' . $benefit['image']) }}" alt="{{ $benefit['title'] }}" class="img-fluid product-image">
                            <div class="product-info d-flex">
                                <div>
                                    <h5 class="product-title mb-0">{{ $benefit['title'] }}</h5>
                                    <p class="product-p">{{ $benefit['desc'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <div class="monogram-gallery-section-wrapper position-relative py-5">
        <div class="gallery-background"></div>

        <div class="monogram-gallery-section container mb-5">
            <h2 class="monogram-gallery-title fw-bold mb-4">Recommended Foto</h2>

            @if($galleries->isEmpty())
                <div class="alert alert-warning text-center" role="alert" data-aos="zoom-in">
                    Belum ada gambar yang dimasukkan ke dalam galeri.
                </div>
            @else
                <div class="lightbox" data-mdb-lightbox-init>
                    <div class="multi-carousel overflow-hidden" id="monogram-carousel">
                        <div class="multi-carousel-inner d-flex" id="carousel-track">
                            @foreach ($galleries as $index => $gallery)
                            <div class="multi-carousel-item me-2" style="flex: 0 0 auto; width: 300px;">
                                <img
                                    src="{{ asset('storage/app/public/' . $gallery->gambar) }}"
                                    data-mdb-img="{{ asset('storage/app/public/' . $gallery->gambar) }}"
                                    alt="Rekomendasi Foto"
                                    class="w-100 rounded shadow-sm"
                                />
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Komentar Section -->
    <section class="monogram-feedback-section">
        <div class="monogram-feedback-form container max-w-1305 p-4 bg-white rounded-3 shadow-sm border border-light mb-5">
            <div id="alertSuccess" class="alert alert-success d-none"></div>
            <div id="alertError" class="alert alert-danger d-none"></div>

            <form id="formKomentar" action="{{ route('komentar.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Pengguna<span class="text-danger">*</span></label>
                    <input type="text" name="nama" id="nama" required class="form-control" placeholder="Nama">
                </div>
                <div class="mb-3">
                    <label for="komentar" class="form-label">Komentar <span class="text-danger">*</span></label>
                    <textarea name="komentar" id="komentar" rows="5" required class="form-control" placeholder="Tulis komentar..."></textarea>
                    <div class="form-text text-end" id="batasInfo">0 kata / 0 karakter (maks. 50 kata / 300 karakter)</div>
                </div>
                <div class="d-flex justify-content-start">
                    <button type="submit" class="btn btn-dark px-5 py-2">Kirim Komentar</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Script Validasi Gabungan -->
    <script>
        const komentarInput = document.getElementById('komentar');
        const batasInfo = document.getElementById('batasInfo');
        const formKomentar = document.getElementById('formKomentar');
        const maxWords = 50;
        const maxChars = 300;

        function updateLimit() {
            let text = komentarInput.value;
            let words = text.trim().split(/\s+/).filter(word => word.length > 0);
            let chars = text.length;

            // Jika melebihi batas karakter atau kata, potong
            if (words.length > maxWords || chars > maxChars) {
                // Potong berdasarkan kata
                if (words.length > maxWords) {
                    words = words.slice(0, maxWords);
                }
                // Gabungkan kembali jadi string
                let newText = words.join(" ");

                // Potong berdasarkan karakter
                if (newText.length > maxChars) {
                    newText = newText.slice(0, maxChars);
                }

                komentarInput.value = newText;
            }

            // Perbarui tampilan info
            const currentWords = komentarInput.value.trim().split(/\s+/).filter(w => w.length > 0).length;
            const currentChars = komentarInput.value.length;
            batasInfo.textContent = `${currentWords} kata / ${currentChars} karakter (maks. 50 kata / 300 karakter)`;
        }

        komentarInput.addEventListener('input', updateLimit);
        komentarInput.addEventListener('paste', function (e) {
            setTimeout(updateLimit, 10); // Tunggu teks ter-paste lalu validasi
        });

        formKomentar.addEventListener('submit', function (e) {
            const finalWords = komentarInput.value.trim().split(/\s+/).filter(word => word.length > 0);
            const finalChars = komentarInput.value.length;

            if (finalWords.length > maxWords || finalChars > maxChars) {
                e.preventDefault();
                alert('Komentar melebihi batas maksimal (50 kata atau 300 karakter).');
            }
        });
    </script>


    <!-- Tampilkan Komentar -->
    @if(isset($komentars) && $komentars->isNotEmpty())
    <div class="monogram-feedbacks-container mt-5">
        <div class="monogram-feedbacks">
            <div class="text-center mb-4">
                <h3 class="text-2xl font-bold">Apa Kata Mereka?</h3>
                <div class="monogram-feedbacks-line mx-auto"></div>
            </div>
            <div class="monogram-feedbacks-wrapper" id="feedbackWrapper">
                @foreach($komentars as $index => $komentar)
                    @if($komentar->is_approve)
                        <div class="monogram-feedback-card">
                            <div class="feedback-card-body">
                                <h4 class="feedback-user-name">{{ $komentar->nama ?? 'Anonim' }}</h4>
                                <div class="feedback-name-line"></div>
                                <p class="feedback-user-quote">"{{ $komentar->komentar }}"</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- JQuery, AOS & AJAX Script -->
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

        // Form submission handler
        $('#formKomentar').on('submit', function(e) {
            e.preventDefault();
            const form = $(this);
            const formData = form.serialize();

            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: formData,
                success: function(res) {
                    $('#alertSuccess').removeClass('d-none').text('Komentar berhasil dikirim dan telah ditampilkan.');
                    $('#alertError').addClass('d-none');
                    form[0].reset();

                    // Tambahkan komentar terbaru ke atas dengan animasi
                    const newComment = $(`
                        <div class="monogram-feedback-card" data-aos="zoom-in">
                            <div class="feedback-card-body">
                                <h4 class="feedback-user-name">${res.nama}</h4>
                                <div class="feedback-name-line"></div>
                                <p class="feedback-user-quote">"${res.komentar}"</p>
                            </div>
                        </div>
                    `);

                    $('#feedbackWrapper').prepend(newComment);
                    // Refresh AOS to apply to the new element
                    AOS.refresh();
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorText = '';
                    for (const key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            errorText += `<li>${errors[key][0]}</li>`;
                        }
                    }
                    $('#alertError').removeClass('d-none').html(`<ul>${errorText}</ul>`);
                    $('#alertSuccess').addClass('d-none');
                }
            });
        });

        // News Navigation Script
        $(document).ready(function() {
            const newsCards = $('.news-daily-card');
            const totalCards = newsCards.length;
            let currentIndex = 0;

            $('#nextBtn').click(function() {
                newsCards.eq(currentIndex).hide();
                currentIndex = (currentIndex + 1) % totalCards;
                newsCards.eq(currentIndex).fadeIn();
                updateIndexDisplay();
            });

            $('#prevBtn').click(function() {
                newsCards.eq(currentIndex).hide();
                currentIndex = (currentIndex - 1 + totalCards) % totalCards;
                newsCards.eq(currentIndex).fadeIn();
                updateIndexDisplay();
            });

            function updateIndexDisplay() {
                $('#newsIndexDisplay').text(`${currentIndex + 1} dari ${totalCards}`);
            }
        });
    </script>
@endsection
