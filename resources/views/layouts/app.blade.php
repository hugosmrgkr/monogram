<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monogram Toba - @yield('title', 'Photography Studio')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    @yield('styles')
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Navigation -->
    @unless(request()->routeIs('hasil'))
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom {{ request()->routeIs('service') ? 'navbar-transparent text-white' : '' }}">
        <div class="container">
            <a class="logo-text" href="{{ route('home') }}">
                <span class="highlight">M</span>ONOGRAM_
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

                {{-- Menu di Tengah --}}
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link navbar-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-link {{ request()->routeIs('faq') ? 'active' : '' }}" href="{{ route('faq') }}">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-link {{ request()->routeIs('service') ? 'active' : '' }}" href="{{ route('service') }}">Pilihan Layanan</a>
                    </li>
                </ul>

                {{-- Login / Logout di Kanan --}}
                <div class="navbar-login-wrapper">
                    @auth
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                        </form>
                    @else
                        <a href="login" class="btn-admin">
                            <i class="bi bi-shield-lock"></i> Admin
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    @endunless

    <!-- Main Content -->
    <main class="py-4 flex-grow-1">
        <div class="container">
            @yield('content')
        </div>
    </main>
    
    {{-- Tombol WhatsApp Mengambang --}}
    <a href="https://wa.me/6282268691532" target="_blank"
        class="d-flex align-items-center text-white text-decoration-none"
        style="position: fixed; bottom: 24px; left: 24px; z-index: 999; background-color: #25D366; width: 60px; height: 60px; border-radius: 30px; overflow: hidden; white-space: nowrap; padding-left: 20px; transition: all 0.3s ease;"
        onmouseover="this.style.width='180px'; this.children[1].style.opacity='1'; this.children[0].style.transform='scale(1.2)'"
        onmouseout="this.style.width='60px'; this.children[1].style.opacity='0'; this.children[0].style.transform='scale(1)'"
        >
        <i class="fab fa-whatsapp" style="font-size: 24px; transition: transform 0.3s ease;"></i>
        <span style="opacity: 0; margin-left: 10px; transition: opacity 0.3s ease;">Chat Kami</span>
    </a>



    <!-- Footer -->
    @include('layouts.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" defer></script>
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

            // Hitung lebar isi asli (sebelum digandakan)
            const itemWidth = carouselTrack.scrollWidth / 2;

            function autoScroll() {
                scrollPos += scrollSpeed;

                // Jika scroll sudah sejauh isi asli, reset scrollPos ke 0
                if (scrollPos >= itemWidth) {
                    scrollPos = 0;
                }

                carouselTrack.style.transform = `translateX(-${scrollPos}px)`;

                requestAnimationFrame(autoScroll);
            }

            autoScroll();
        });
    </script>




</body>

</html>
