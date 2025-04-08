<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monogram Toba - @yield('title', 'Photography Studio')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    
    <style>
        /* NAVIGATION STYLE */
        .navbar {
            height: 164px;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.05);
        }

        .navbar-nav {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 48px;
        }

        .nav-link {
            padding: 14px 24px;
            border-radius: 8px;
            font-size: 20px;
            font-family: Inter, sans-serif;
            font-weight: 500;
            line-height: 30px;
            text-align: center;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .nav-link.active {
            background-color: black;
            color: white !important;
        }

        .nav-link:not(.active) {
            background-color: white;
            color: black;
            box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.05);
        }

        .nav-link:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }

        /* LOGO */
        .logo-text {
            position: absolute;
            left: 16px;
            top: 41px;
            font-size: 20px;
            font-family: Inter, sans-serif;
            font-weight: 500;
            line-height: 30px;
            color: black;
            filter: blur(2px);
        }

.navbar-transparent {
    position: absolute;
    top: 0;
    width: 100%;
    background: transparent !important;
    box-shadow: none;
    z-index: 999;
}

.navbar-transparent .nav-link,
.navbar-transparent .logo-text {
    color: white !important;
}

.navbar-transparent .nav-link.active {
    background-color: transparent;
    outline: 2px solid white;
    color: white !important;
}

        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light {{ request()->routeIs('service') ? 'navbar-transparent text-white' : '' }}">

        <div class="container">
        <a class="logo-text {{ request()->routeIs('service') ? 'text-white' : '' }}" href="{{ route('home') }}">>MONOGRAM_</a>

            
            <!-- Toggle Button for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('faq') ? 'active' : '' }}" href="{{ route('faq') }}">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('service') ? 'active' : '' }}" href="{{ route('service') }}">Pilihan Layanan</a>
                    </li>
                    <li class="nav-item">
                        @auth
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                            </form>
                        @else
                            <a class="btn btn-dark btn-sm {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Login Admin</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-4 flex-grow-1">
        <div class="container">
            @yield('content')
        </div>
    </main>
    {{-- Tombol WhatsApp Mengambang --}}
<a href="https://wa.me/6282268691532" target="_blank" style="position: fixed; bottom: 24px; left: 24px; z-index: 999;">
    <div style="width: 150px; height: 80px; background: #19CF1C; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-size: 20px; font-weight: 500;">
        WhatsApp
    </div>
</a>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" defer></script>

</body>

</html>
