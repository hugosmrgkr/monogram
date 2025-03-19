<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monogram Toba - @yield('title', 'Photography Studio')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
     <style>
    /* General Styles */
body {
    font-family: Arial, sans-serif;
    color: #000;
    line-height: 1.6;
    scroll-behavior: smooth;
}

h2 {
    font-size: 1.8rem;
    font-weight: bold;
}

/* Navbar Styling */
.navbar {
    padding: 15px 0;
    transition: background 0.4s ease;
    background-color: white !important;
}

.navbar-brand {
    font-weight: bold;
    letter-spacing: 1px;
}

/* Modified nav-link and active state */
.nav-link {
    color: #000;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    padding: 10px 25px; /* Increased padding to match your example */
    border-radius: 0;
    margin: 0 5px;
}

/* Create the black box effect for active/hover state */
.nav-link:hover, .nav-link.active {
    color: #fff;
    background-color: #000;
    font-weight: bold;
}
.nav-item{
    position: relative;
}


/* Hero Section */
.hero-section {
    position: relative;
    overflow: hidden;
    color: white;
    text-align: center;
}

.hero-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
}

.hero-text h1 {
    font-size: 3rem;
    font-weight: bold;
    text-shadow: 2px 2px 5px rgba(0,0,0,0.6);
    animation: fadeInUp 1s ease;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Footer */
.footer {
    background-color: #000;
    color: #fff;
    padding: 10px 0;
    font-size: 0.9rem;
    text-align: center;
}

/* Button Custom */
.btn-primary {
    background-color: #000;
    border: none;
    transition: background 0.3s ease;
    border-radius: 0;
}

.btn-primary:hover {
    background-color: #333;
}

/* Remove the underline effect since we're using box effect now */
.nav-item {
    position: relative;
    margin: 0 5px;
}

/* Remove the previous after pseudo-element */
.nav-item::after {
    content: none;
}

/* Responsive */
@media (max-width: 768px) {
    .hero-text h1 {
        font-size: 2rem;
    }

    .nav-link {
        padding: 10px;
    }
}

@media (max-width: 576px) {
    .hero-text h1 {
        font-size: 1.8rem;
    }

    .footer p {
        font-size: 0.8rem;
    }
}
</style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Monogram Toba</a>

            <!-- Toggle Button for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Link Beranda -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    </li>

                    <!-- Link Profil Owner -->
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Profil Owner</a>
                    </li>

                    <!-- Link Profil Lengkap Monogram -->
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Profil Lengkap Monogram</a>
                    </li>

                    <!-- Link Pilihan Layanan -->
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Pilihan Layanan</a>
                    </li>

                    <!-- Login/Logout Dinamis -->
                    <li class="nav-item">
                        @auth
                            <!-- Jika Sudah Login, Tampilkan Logout -->
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm logout-btn">
                                    Logout
                                </button>
                            </form>
                        @else
                            <!-- Jika Belum Login, Tampilkan Login -->
                            <a class="btn btn-dark btn-sm login-btn {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} Monogram Toba. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" defer></script>
</body>


</html>
