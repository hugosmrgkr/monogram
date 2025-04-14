<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fa fa-tachometer-alt menu-icon"></i> <!-- Ikon untuk Dashboard -->
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('gallery.index') }}">
                <i class="fa fa-image menu-icon"></i> <!-- Ikon untuk Galeri -->
                <span class="menu-title">Galeri</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('about.index') }}">
                <i class="fa fa-info-circle menu-icon"></i> <!-- Ikon untuk About Monokkrom -->
                <span class="menu-title">About Monokkrom</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('berita.index') }}">
                <i class="fa fa-newspaper menu-icon"></i> <!-- Ikon untuk Berita Harian -->
                <span class="menu-title">Berita Harian</span>
            </a>
        </li>
        <!-- Menu Layanan Baru -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('layanan.index') }}">
                <i class="fa fa-cogs menu-icon"></i> <!-- Ikon untuk Layanan -->
                <span class="menu-title">Layanan</span>
            </a>
        </li>
        <!-- Menu FAQ Baru -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('faq.index') }}">
                <i class="fa fa-question-circle menu-icon"></i> <!-- Ikon untuk FAQ -->
                <span class="menu-title">FAQ</span>
            </a>
        </li>
    </ul>
</nav>
