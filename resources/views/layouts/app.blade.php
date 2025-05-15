<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monogram Toba - @yield('title', 'Photography Studio')</title>
    <link rel="icon" href="{{ asset('assets/images/logo-user.jpg') }}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Raleway:wght@700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    @yield('styles')
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Navigation -->
    @unless(request()->routeIs('hasil'))
        <nav
            class="navbar navbar-expand-lg navbar-light navbar-custom {{ request()->routeIs('service') ? 'navbar-transparent text-white' : '' }}">
            <div class="container d-flex justify-content-between">
                {{-- Logo di kiri --}}
                <a class="logo-text" href="{{ route('home') }}">
                    <span class="highlight">>MONOGRAM_</span>
                </a>

                {{-- Toggler Button --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                {{-- Konten navbar --}}
                <div class="collapse navbar-collapse" id="navbarNav">
                    {{-- Tengah --}}
                    <div class="d-flex w-100 justify-content-center">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link navbar-link {{ request()->routeIs('home') ? 'active' : '' }}"
                                    href="{{ route('home') }}">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navbar-link {{ request()->routeIs('tentang-kami') ? 'active' : '' }}"
                                    href="{{ route('tentang-kami') }}">Tentang Kami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navbar-link {{ request()->routeIs('faq') ? 'active' : '' }}"
                                    href="{{ route('faq') }}">FAQ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navbar-link {{ request()->routeIs('service') ? 'active' : '' }}"
                                    href="{{ route('service') }}">Pilihan Layanan</a>
                            </li>
                        </ul>
                    </div>

                    {{-- Icon admin login di kanan --}}
                    <div class="d-flex ms-auto">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link navbar-link" href="{{ route('admin.login') }}" style="color:white;">
                                    <i class="bi bi-person-gear" style="font-size: 1.5rem;"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    @endunless

    <!-- Main Content -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    {{-- Tombol WhatsApp Mengambang --}}
    <a href="https://wa.me/6282268691532" target="_blank"
        class="d-flex align-items-center text-white text-decoration-none"
        style="position: fixed; bottom: 24px; left: 24px; z-index: 999; background-color: #25D366; width: 60px; height: 60px; border-radius: 30px; overflow: hidden; white-space: nowrap; padding-left: 20px; transition: all 0.3s ease;"
        onmouseover="this.style.width='180px'; this.children[1].style.opacity='1'; this.children[0].style.transform='scale(1.2)'"
        onmouseout="this.style.width='60px'; this.children[1].style.opacity='0'; this.children[0].style.transform='scale(1)'">
        <i class="fab fa-whatsapp" style="font-size: 24px; transition: transform 0.3s ease;"></i>
        <span style="opacity: 0; margin-left: 10px; transition: opacity 0.3s ease;">Chat Kami</span>
    </a>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener('scroll', function () {
            const navbar = document.querySelector('nav.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const carouselTrack = document.getElementById('carousel-track');
            const originalContent = carouselTrack.innerHTML;

            // Gandakan isi carousel untuk efek infinite scroll
            carouselTrack.innerHTML += originalContent;

            const scrollSpeed = 0.5;
            let scrollPos = 0;
            let isDragging = false;
            let startX;
            let scrollLeft;

            // Hitung lebar isi asli (sebelum digandakan)
            const itemWidth = carouselTrack.scrollWidth / 2;

            // Fungsi untuk auto scroll
            function autoScroll() {
                if (!isDragging) {
                    scrollPos += scrollSpeed;

                    // Jika scroll sudah sejauh isi asli, reset scrollPos ke 0
                    if (scrollPos >= itemWidth) {
                        scrollPos = 0;
                    }

                    carouselTrack.style.transform = `translateX(-${scrollPos}px)`;
                }

                requestAnimationFrame(autoScroll);
            }

            // Fungsi untuk memulai drag
            carouselTrack.addEventListener('mousedown', (e) => {
                isDragging = true;
                startX = e.pageX - carouselTrack.offsetLeft;
                scrollLeft = carouselTrack.scrollLeft;
            });

            // Fungsi untuk menggerakkan saat drag
            carouselTrack.addEventListener('mousemove', (e) => {
                if (!isDragging) return;
                e.preventDefault();
                const x = e.pageX - carouselTrack.offsetLeft;
                const walk = (x - startX) * 3; // Kecepatan geser manual
                carouselTrack.scrollLeft = scrollLeft - walk;
            });

            // Fungsi untuk mengakhiri drag
            carouselTrack.addEventListener('mouseup', () => {
                isDragging = false;
            });

            // Menjaga agar scroll otomatis tetap berjalan
            autoScroll();
        });
    </script>
    <script>
        // Ambil elemen tombol dan kontainer
        const scrollLeftButton = document.getElementById('scrollLeft');
        const scrollRightButton = document.getElementById('scrollRight');
        const scrollContainer = document.getElementById('scrollContainer');

        // Event listener untuk tombol scroll kiri
        scrollLeftButton.addEventListener('click', () => {
            scrollContainer.scrollBy({
                left: -300,
                behavior: 'smooth'
            });
        });

        // Event listener untuk tombol scroll kanan
        scrollRightButton.addEventListener('click', () => {
            scrollContainer.scrollBy({
                left: 300,
                behavior: 'smooth'
            });
        });

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.news-daily-card');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            let currentIndex = 0;

            function updateView(index) {
                cards.forEach((card, i) => {
                    card.style.display = (i === index) ? 'flex' : 'none';
                });
            }

            prevBtn.addEventListener('click', () => {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateView(currentIndex);
                }
            });

            nextBtn.addEventListener('click', () => {
                if (currentIndex < cards.length - 1) {
                    currentIndex++;
                    updateView(currentIndex);
                }
            });

            prevBtnMobile.addEventListener('click', () => {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateView(currentIndex);
                }
            });

            nextBtnMobile.addEventListener('click', () => {
                if (currentIndex < cards.length - 1) {
                    currentIndex++;
                    updateView(currentIndex);
                }
            });
        });
    </script>

</body>


</html>