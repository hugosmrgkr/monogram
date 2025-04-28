<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.gallery.index') }}">
                <i class="fa fa-image menu-icon"></i>
                <span class="menu-title">Galeri</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.about.index') }}">
                <i class="fa fa-info-circle menu-icon"></i>
                <span class="menu-title">Tentang kami</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.berita.index') }}">
                <i class="fa fa-newspaper menu-icon"></i>
                <span class="menu-title">Berita Harian</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.layanan.index') }}">
                <i class="fa fa-cogs menu-icon"></i>
                <span class="menu-title">Layanan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.faq.index') }}">
                <i class="fa fa-question-circle menu-icon"></i>
                <span class="menu-title">FAQ</span>
            </a>
        </li>
        <!-- Ulasan Baru -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.ulasan.index') }}">
                <i class="fa fa-comments menu-icon"></i>
                <span class="menu-title">Komentar</span>
            </a>
        </li>
    </ul>
</nav>
