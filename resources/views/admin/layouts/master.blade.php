<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <base href="/public">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:800&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets-admin/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets-admin/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets-admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="assets-admin/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <link rel="stylesheet" href="assets-admin/css/vertical-layout-light/style.css">
    <link rel="icon" href="assets-admin/images/admin.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">


   
</head>

<body>
    <div class="container-scroller">
        @include('admin.layouts.header')
        <div class="container-fluid page-body-wrapper">
            @include('admin.layouts.sidebar')
            <!-- Add sidebar overlay for mobile -->
            <div class="sidebar-overlay"></div>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets-admin/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets-admin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets-admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets-admin/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/settings.js') }}"></script>
    <script src="{{ asset('assets-admin/js/todolist.js') }}"></script>
    <script src="{{ asset('assets-admin/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets-admin/js/Chart.roundedBarCharts.js') }}"></script>
    
    <script>
        // Enhanced sidebar toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Get elements
            const body = document.querySelector('body');
            const toggleBtn = document.querySelector('[data-toggle="minimize"]');
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.sidebar-overlay');
            
            // Desktop sidebar toggle
            if (toggleBtn) {
                toggleBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    if (body.classList.contains('sidebar-icon-only')) {
                        body.classList.remove('sidebar-icon-only');
                    } else {
                        body.classList.add('sidebar-icon-only');
                    }
                    
                    // On mobile, handle the sidebar differently
                    if (window.innerWidth <= 991) {
                        if (sidebar.classList.contains('show-sidebar')) {
                            sidebar.classList.remove('show-sidebar');
                            body.classList.remove('show-sidebar-overlay');
                        } else {
                            sidebar.classList.add('show-sidebar');
                            body.classList.add('show-sidebar-overlay');
                        }
                    }
                });
            } else {
                console.error('Toggle button not found!');
            }
            
            // Close sidebar when clicking overlay
            if (overlay) {
                overlay.addEventListener('click', function() {
                    sidebar.classList.remove('show-sidebar');
                    body.classList.remove('show-sidebar-overlay');
                });
            }
            
            // Adjust sidebar on window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth <= 991) {
                    // On mobile/tablet
                    if (body.classList.contains('sidebar-icon-only') && !sidebar.classList.contains('show-sidebar')) {
                        sidebar.classList.remove('show-sidebar');
                    }
                } else {
                    // On desktop
                    sidebar.classList.remove('show-sidebar');
                    body.classList.remove('show-sidebar-overlay');
                }
            });
            
            // Add active class to current page link
            const currentLocation = window.location.href;
            document.querySelectorAll('.nav-link').forEach(link => {
                const href = link.getAttribute('href');
                if (href && currentLocation.includes(href)) {
                    link.style.backgroundColor = '#2c3136';
                    link.style.borderLeft = '3px solid #fff';
                }
                
                // Hover effects
                link.addEventListener('mouseenter', function() {
                    if (!currentLocation.includes(this.getAttribute('href'))) {
                        this.style.backgroundColor = '#2c3136';
                        this.style.borderLeft = '3px solid #6c757d';
                    }
                });
                
                link.addEventListener('mouseleave', function() {
                    if (!currentLocation.includes(this.getAttribute('href'))) {
                        this.style.backgroundColor = 'transparent';
                        this.style.borderLeft = '3px solid transparent';
                    }
                });
            });
        });
    </script>
</body>
</html>