<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/dashboard/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/styles.min.css') }}" />

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <x-application-logo />
                                    {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                                </a>
                                {{-- <p class="text-center">Your Social Campaigns</p> --}}
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/dashboard/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
