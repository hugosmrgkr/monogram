<nav class="main-navbar navbar fixed-top px-3 py-2 d-flex justify-content-between align-items-center bg-dark text-white">
    <!-- Left Side (Logo + Sidebar Toggle Desktop) -->
    <div class="d-flex align-items-center">
        <!-- Brand Logo -->
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand text-white fw-bold text-decoration-none"
           style="font-family: 'Inter', sans-serif; font-size: 20px;">
            >MONOGRAM_
        </a>

        <!-- Sidebar Toggle Button (Desktop Only) -->
        <button class="btn btn-sm btn-sidebar-toggle ms-3 d-none d-md-inline-flex align-items-center justify-content-center"
                type="button" data-toggle="minimize" aria-label="Toggle Sidebar">
            <i class="fas fa-bars fs-5 text-white"></i>
        </button>
    </div>

    <!-- Right Side -->
    <div class="d-flex align-items-center gap-3">
        <!-- Sidebar Toggle Button (Mobile Only) -->
        <button class="btn btn-sm btn-sidebar-toggle d-inline-flex d-md-none align-items-center justify-content-center"
                type="button" id="mobileSidebarToggle" aria-label="Toggle Sidebar">
            <i class="fas fa-bars fs-5 text-white"></i>
        </button>

        <!-- Logout Button (icon only) -->
        <form action="{{ route('admin.admin.logout') }}" method="POST" class="mb-0">
            @csrf
            <button type="submit" class="btn btn-link text-white d-flex align-items-center justify-content-center" title="Logout">
                <i class="bi bi-box-arrow-right fs-5"></i>
            </button>
        </form>

    </div>
</nav>
