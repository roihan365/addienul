<div class="container fixed-top">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white z-2">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo masjid" width="30" height="24">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto mr-3">
                    <li class="nav-item mx-md-2">
                        <a href="#beranda" class="nav-link active">Beranda</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="#agenda" class="nav-link">Agenda</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="#" class="nav-link">Tentang</a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                            Tentang
                        </a>
                        <div class="dropdown-menu">
                            <a href="" class="dropdown-item">Link</a>
                            <a href="" class="dropdown-item">Link</a>
                            <a href="" class="dropdown-item">Link</a>
                        </div>
                    </li> --}}
                    <li class="nav-item mx-md-2">
                        <a href="#kontak" class="nav-link">Kontak</a>
                    </li>
                </ul>

                @guest
                    <!-- Mobile Button -->
                    <form class="form-inline d-sm-block d-md-none">
                        <button class="btn btn-login my-2 my-sm-0 px-4" type="button"
                            onclick="event.preventDefault(); location.href='#infaq';">
                            Donasi
                        </button>
                    </form>


                    <!-- Dekstop Button -->
                    <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                        <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button"
                            onclick="event.preventDefault(); location.href='#infaq';">
                            Donasi
                        </button>
                    </form>
                @endguest

                @auth
                    <!-- Mobile Button -->
                    <form class="form-inline d-sm-block d-md-none" action="{{ url('logout') }}" method="POST"">
                        @csrf
                        <button class="btn btn-login my-2 my-sm-0 px-4" type="submit">
                            Keluar
                        </button>
                    </form>


                    <!-- Dekstop Button -->
                    <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ url('logout') }}" method="POST"">
                        @csrf
                        <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
                            Keluar
                        </button>
                    </form>
                @endauth

            </div>
        </div>
    </nav>
    {{-- <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="#">
            <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Bootstrap" width="30" height="24">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2">
                    <a href="{{ route('home') }}" class="nav-link active">Home</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="#" class="nav-link">Paket Travel</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                        Services
                    </a>
                    <div class="dropdown-menu">
                        <a href="" class="dropdown-item">Link</a>
                        <a href="" class="dropdown-item">Link</a>
                        <a href="" class="dropdown-item">Link</a>
                    </div>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="#" class="nav-link">Testimonial</a>
                </li>
            </ul>

            @guest
                <!-- Mobile Button -->
                <form class="form-inline d-sm-block d-md-none">
                    <button class="btn btn-login my-2 my-sm-0 px-4" type="button"
                        onclick="event.preventDefault(); location.href='{{ url('login') }}';">
                        Masuk
                    </button>
                </form>


                <!-- Dekstop Button -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button"
                        onclick="event.preventDefault(); location.href='{{ url('login') }}';">
                        Masuk
                    </button>
                </form>
            @endguest

            @auth
                <!-- Mobile Button -->
                <form class="form-inline d-sm-block d-md-none" action="{{ url('logout') }}" method="POST"">
                    @csrf
                    <button class="btn btn-login my-2 my-sm-0 px-4" type="submit">
                        Keluar
                    </button>
                </form>


                <!-- Dekstop Button -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ url('logout') }}" method="POST"">
                    @csrf
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
                        Keluar
                    </button>
                </form>
            @endauth

        </div>
    </nav> --}}
</div>
