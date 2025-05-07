<nav class="sidebar sidebar-offcanvas bg-gray-900 shadow-md h-[calc(100vh-70px)] w-[260px] z-[1031] transition-all duration-300 overflow-y-auto" id="sidebar">
    <ul class="nav flex flex-col px-2.5">
        <li class="nav-item mb-1.5">
            <a href="{{ route('admin.dashboard') }}" class="nav-link flex items-center text-gray-100 px-4 py-3 rounded-lg transition-all duration-300 border-l-4 border-transparent hover:bg-gray-800 hover:border-cyan-400">
                <i class="icon-grid menu-icon me-3 text-lg min-w-[18px]"></i>
                <span class="menu-title text-sm font-medium">Dashboard</span>
            </a>
        </li>
        <li class="nav-item mb-1.5">
            <a href="{{ route('admin.gallery.index') }}" class="nav-link flex items-center text-gray-100 px-4 py-3 rounded-lg transition-all duration-300 border-l-4 border-transparent hover:bg-gray-800 hover:border-cyan-400">
                <i class="fa fa-image menu-icon me-3 text-lg min-w-[18px]"></i>
                <span class="menu-title text-sm font-medium">Galeri</span>
            </a>
        </li>
        <li class="nav-item mb-1.5">
            <a href="{{ route('admin.tentang-kami.index') }}" class="nav-link flex items-center text-gray-100 px-4 py-3 rounded-lg transition-all duration-300 border-l-4 border-transparent hover:bg-gray-800 hover:border-cyan-400">
                <i class="fa fa-info-circle menu-icon me-3 text-lg min-w-[18px]"></i>
                <span class="menu-title text-sm font-medium">Tentang Kami</span>
            </a>
        </li>
        <li class="nav-item mb-1.5">
            <a href="{{ route('admin.berita.index') }}" class="nav-link flex items-center text-gray-100 px-4 py-3 rounded-lg transition-all duration-300 border-l-4 border-transparent hover:bg-gray-800 hover:border-cyan-400">
                <i class="fa fa-newspaper menu-icon me-3 text-lg min-w-[18px]"></i>
                <span class="menu-title text-sm font-medium">Berita Harian</span>
            </a>
        </li>
        <li class="nav-item mb-1.5">
            <a href="{{ route('admin.layanan.index') }}" class="nav-link flex items-center text-gray-100 px-4 py-3 rounded-lg transition-all duration-300 border-l-4 border-transparent hover:bg-gray-800 hover:border-cyan-400">
                <i class="fa fa-cogs menu-icon me-3 text-lg min-w-[18px]"></i>
                <span class="menu-title text-sm font-medium">Layanan</span>
            </a>
        </li>
        <li class="nav-item mb-1.5">
            <a href="{{ route('admin.faq.index') }}" class="nav-link flex items-center text-gray-100 px-4 py-3 rounded-lg transition-all duration-300 border-l-4 border-transparent hover:bg-gray-800 hover:border-cyan-400">
                <i class="fa fa-question-circle menu-icon me-3 text-lg min-w-[18px]"></i>
                <span class="menu-title text-sm font-medium">FAQ</span>
            </a>
        </li>
        <li class="nav-item mb-1.5">
            <a href="{{ route('admin.komentar.index') }}" class="nav-link flex items-center text-gray-100 px-4 py-3 rounded-lg transition-all duration-300 border-l-4 border-transparent hover:bg-gray-800 hover:border-cyan-400">
                <i class="fa fa-comments menu-icon me-3 text-lg min-w-[18px]"></i>
                <span class="menu-title text-sm font-medium">Komentar</span>
            </a>
        </li>
    </ul>
</nav>
