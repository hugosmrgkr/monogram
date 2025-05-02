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
    <link rel="stylesheet" href="assets-admin/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets-admin/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets-admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="assets-admin/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <link rel="stylesheet" href="assets-admin/css/vertical-layout-light/style.css">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    </head>

<body>
    <div class="container-scroller">
        @include('admin.layouts.header')
        <div class="container-fluid page-body-wrapper">
            @include('admin.layouts.sidebar')
            <!-- partial -->
            <div class="main-panel" style="margin-left: 260px;">
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
    <script src="{{ asset('assets-admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets-admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets-admin/js/template.js') }}"></script>
    <script src="{{ asset('assets-admin/js/settings.js') }}"></script>
    <script src="{{ asset('assets-admin/js/todolist.js') }}"></script>
    <script src="{{ asset('assets-admin/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets-admin/js/Chart.roundedBarCharts.js') }}"></script>

</body>

</html>
