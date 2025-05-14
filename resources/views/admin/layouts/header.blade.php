<nav class="navbar col-12 fixed-top d-flex flex-row bg-black shadow-sm">
    <!-- Brand Logo -->
    <div class="navbar-brand-wrapper d-flex align-items-center justify-content-center px-4 bg-black">
        <!-- Logo untuk Desktop -->
        <a href="{{ route('admin.dashboard') }}"
           class="navbar-brand fw-bold text-white text-decoration-none d-none d-lg-block"
           style="font-family: Inter, sans-serif; font-size: 20px;">
            <span class="highlight text-info">M</span>ONOGRAM_
        </a>
        <!-- Logo untuk Mobile -->
        <a href="{{ route('admin.dashboard') }}"
           class="navbar-brand fw-bold text-white text-decoration-none d-lg-none"
           style="font-family: Inter, sans-serif; font-size: 20px;">
            <span class="highlight text-info">M</span>
        </a>
    </div>

    <!-- Navbar Menu -->
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end flex-grow-1 px-3 bg-black">
        <!-- Sidebar Toggle Button -->
        <button class="navbar-toggler align-self-center text-white border-0 me-3"
                type="button"
                data-toggle="minimize"
                aria-label="Toggle Sidebar">
            <span class="icon-menu fs-5"></span>
        </button>

        <!-- Right-side Menu (Logout) -->
        <ul class="navbar-nav navbar-nav-right d-flex align-items-center mb-0">
            <li class="nav-item nav-profile">
                <form action="{{ route('admin.admin.logout') }}" method="POST" class="mb-0">
                    @csrf
                    <button type="submit"
                            class="btn btn-outline-light btn-sm rounded px-3 py-2 d-flex align-items-center">
                        <i class="ti ti-power-off me-2"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>
