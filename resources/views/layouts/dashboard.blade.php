<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Masjid Ad Dienul Amin Citraland</title>
    @stack('prepend-style')
    @include('includes.admin.style')
    @stack('addon-style')
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('includes.admin.sidebar')
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('includes.admin.navbar')
            <!--  Header End -->
            <div class="container-fluid">
                <!--  Row 1 -->
                {{ $slot }}
                @include('includes.admin.footer')
            </div>
        </div>
    </div>
    @stack('prepend-script')
    @include('includes.admin.script')
    @stack('addon-script')
    @include('sweetalert::alert')
</body>

</html>
