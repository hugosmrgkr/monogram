<nav class="sidebar sidebar-offcanvas" id="sidebar"
     style="background-color: #212529;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            height: calc(100vh - 70px);
            width: 260px;
            z-index: 1031;
            transition: all 0.3s ease;
            overflow-y: auto;">

     <ul class="nav flex-column" style="padding: 0 10px;">
        <li class="nav-item" style="margin-bottom: 5px;">
            <a class="nav-link d-flex align-items-center" href="{{ route('admin.dashboard') }}"
               style="color: #f8f9fa; padding: 12px 15px; border-radius: 8px; transition: all 0.3s ease; border-left: 3px solid transparent;">
                <i class="icon-grid menu-icon me-3" style="font-size: 18px; min-width: 18px;"></i>
                <span class="menu-title" style="font-size: 14px; font-weight: 500;">Dashboard</span>
            </a>
        </li>
        <li class="nav-item" style="margin-bottom: 5px;">
            <a class="nav-link d-flex align-items-center" href="{{ route('admin.gallery.index') }}"
               style="color: #f8f9fa; padding: 12px 15px; border-radius: 8px; transition: all 0.3s ease; border-left: 3px solid transparent;">
                <i class="fa fa-image menu-icon me-3" style="font-size: 18px; min-width: 18px;"></i>
                <span class="menu-title" style="font-size: 14px; font-weight: 500;">Galeri</span>
            </a>
        </li>
        <li class="nav-item" style="margin-bottom: 5px;">
            <a class="nav-link d-flex align-items-center" href="{{ route('admin.about.index') }}"
               style="color: #f8f9fa; padding: 12px 15px; border-radius: 8px; transition: all 0.3s ease; border-left: 3px solid transparent;">
                <i class="fa fa-info-circle menu-icon me-3" style="font-size: 18px; min-width: 18px;"></i>
                <span class="menu-title" style="font-size: 14px; font-weight: 500;">Tentang kami</span>
            </a>
        </li>
        <li class="nav-item" style="margin-bottom: 5px;">
            <a class="nav-link d-flex align-items-center" href="{{ route('admin.berita.index') }}"
               style="color: #f8f9fa; padding: 12px 15px; border-radius: 8px; transition: all 0.3s ease; border-left: 3px solid transparent;">
                <i class="fa fa-newspaper menu-icon me-3" style="font-size: 18px; min-width: 18px;"></i>
                <span class="menu-title" style="font-size: 14px; font-weight: 500;">Berita Harian</span>
            </a>
        </li>
        <li class="nav-item" style="margin-bottom: 5px;">
            <a class="nav-link d-flex align-items-center" href="{{ route('admin.layanan.index') }}"
               style="color: #f8f9fa; padding: 12px 15px; border-radius: 8px; transition: all 0.3s ease; border-left: 3px solid transparent;">
                <i class="fa fa-cogs menu-icon me-3" style="font-size: 18px; min-width: 18px;"></i>
                <span class="menu-title" style="font-size: 14px; font-weight: 500;">Layanan</span>
            </a>
        </li>
        <li class="nav-item" style="margin-bottom: 5px;">
            <a class="nav-link d-flex align-items-center" href="{{ route('admin.faq.index') }}"
               style="color: #f8f9fa; padding: 12px 15px; border-radius: 8px; transition: all 0.3s ease; border-left: 3px solid transparent;">
                <i class="fa fa-question-circle menu-icon me-3" style="font-size: 18px; min-width: 18px;"></i>
                <span class="menu-title" style="font-size: 14px; font-weight: 500;">FAQ</span>
            </a>
        </li>
        <li class="nav-item" style="margin-bottom: 5px;">
            <a class="nav-link d-flex align-items-center" href="{{ route('admin.komentar.index') }}"
               style="color: #f8f9fa; padding: 12px 15px; border-radius: 8px; transition: all 0.3s ease; border-left: 3px solid transparent;">
                <i class="fa fa-comments menu-icon me-3" style="font-size: 18px; min-width: 18px;"></i>
                <span class="menu-title" style="font-size: 14px; font-weight: 500;">Komentar</span>
            </a>
        </li>
    </ul>
</nav>

<style>
    /* Pastikan navigasi pada mobile berfungsi dengan baik */
    @media (max-width: 991px) {
        .sidebar .nav-item {
            margin-bottom: 8px !important;
        }

        .sidebar .nav-link {
            padding: 15px !important;
        }

        /* Pastikan menu title selalu terlihat pada mobile */
        .sidebar-icon-only .sidebar.show-sidebar .menu-title {
            display: block !important;
        }

        /* Perbesar area klik pada mobile */
        .sidebar .nav-link {
            position: relative;
        }

        /* Pastikan icon menu selalu terlihat */
        .sidebar .nav-link i {
            min-width: 18px;
        }
    }
</style>
