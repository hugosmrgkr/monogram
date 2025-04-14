<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monogram Toba - @yield('title', 'Photography Studio')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/service.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="home-page d-flex flex-column min-vh-100">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top">
        <div class="container">
            <!-- Logo Brand -->
            <a class="logo-text" href="{{ route('home') }}">
                <span class="highlight">M</span>onogram Toba
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu Utama di Kanan -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Menu Utama di Tengah -->
                <ul class="navbar-nav d-flex justify-content-center align-items-center mx-auto gap-3">
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
                        <a class="nav-link navbar-link {{ request()->routeIs('service') ? 'active' : '' }}" href="{{ route('service') }}">Layanan</a>
                    </li>
                </ul>
                <!-- Tombol Login/Logout Tetap di Kanan -->
                <div class="d-flex justify-content-center justify-content-lg-end ms-lg-3 mt-2 mt-lg-0">
                    @auth
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login Admin</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow-1">
        <div class="w-100" id="mainContent">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const navbar = document.querySelector("nav.navbar");
            const mainContent = document.getElementById("mainContent");
            const navbarToggler = document.querySelector('.navbar-toggler');
            const navbarCollapse = document.getElementById('navbarNav');

            function updatePadding() {
                if (mainContent && navbar) {
                    const navbarHeight = navbar.offsetHeight;
                    mainContent.style.paddingTop = navbarHeight + 30 + "px";
                }
            }

            updatePadding();
            window.addEventListener("resize", updatePadding);

            if (navbarToggler && navbarCollapse) {
                navbarToggler.addEventListener('click', function () {
                    setTimeout(() => {
                        if (navbarCollapse.classList.contains('show')) {
                            mainContent.style.marginTop = '220px';
                        } else {
                            mainContent.style.marginTop = '';
                        }
                    }, 300);
                });
            }

            window.addEventListener("scroll", function () {
                if (window.scrollY > 50) {
                    navbar.classList.add("scrolled");
                } else {
                    navbar.classList.remove("scrolled");
                }
            });
        });
    </script>

</body>

</html>
