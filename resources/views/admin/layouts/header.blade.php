<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="background-color: #000000;">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background-color: #000000;">
        <a class="navbar-brand brand-logo mr-5 text-white fw-bold" href="{{ route('admin.dashboard') }}"
            style="font-size: 20px; font-family: Inter, sans-serif; text-decoration: none;">
            Monogram Toba
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background-color: #000000; color: #ffffff;">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu" style="color: #ffffff;"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile">
                <form action="{{ route('admin.admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm" style="border-radius: 6px; padding: 8px 16px; transition: background-color 0.3s, color 0.3s;">
                        <i class="ti-power-off"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>

<style>
    .btn-outline-light:hover {
        background-color: #ffffff;
        color: #000000;
        border-color: #ffffff;
    }

    /* Mobile responsive adjustments */
    @media (max-width: 576px) {
        .navbar-brand {
            font-size: 16px !important;
            margin-right: 0 !important;
        }

        .navbar-menu-wrapper {
            padding-left: 10px;
            padding-right: 10px;
        }

        .btn-sm {
            padding: 4px 8px !important;
            font-size: 0.75rem !important;
        }
    }
</style>
