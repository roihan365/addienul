@extends('layouts.app')

@section('title')
    Masjid Ad-Dienul Amin
@endsection

@section('content')
    <!-- Header -->
    <header class="text-center test-header" id="beranda">
        <h1>{!! $data->hero_title !!}
        </h1>
        <p class="mt-3">{!! $data->hero_subtitle !!}
        </p>
        <a href="{{ $data->hero_button_url }}" target="_BLANK"
            class="btn btn-youtube px-4 mt-4">{{ $data->hero_button_text }}</a>
    </header>
    <main>
        {{-- <div class="container">
            <section class="sectionstats row justify-content-center"id="stats">
                <div class="col-3 col-md-2 stats-detail">
                    <h2>20k</h2>
                    <p>Members</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>12</h2>
                    <p>Countries</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>3k</h2>
                    <p>Hotels</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>72</h2>
                    <p>Partners</p>
                </div>
            </section>
        </div> --}}

        <section class="sectionpopular" id="agenda">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-heading">
                        <h2>{{ $data->kajian_title }}</h2>
                        <p>
                            {!! $data->kajian_subtitle !!}
                        </p>
                    </div>
                </div>
            </div>

        </section>
        <section class="section-popular-content" id="popularcontent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    <div class="col-sm-12 col-md-5">
                        <a href="https://www.youtube.com/@Ad-DienulAminTV" target="_BLANK">
                            <img src="assets/img/kajian1.jpeg"
                                class="img-fluid card-travel text-center d-flex flex-column rounded" alt="">
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <a href="https://www.youtube.com/@Ad-DienulAminTV" target="_BLANK">
                            <img src="assets/img/kajian2.jpeg"
                                class="img-fluid card-travel text-center d-flex flex-column rounded" alt="">
                        </a>
                    </div>
                    {{-- @foreach ($items as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card-travel text-center d-flex flex-column" style="background-image: url({{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }});">
                                
                                <div class="travel-country">{{ $item->title }}</div>
                                <div class="travel-location">{{ $item->location }}</div>
                                <div class="travel-button mt-auto">
                                    <a href="{{ route('detail', $item->slug)}}" class="btn btn-travel-details px-4">
                                        View Details
                                    </a>
                                    </div>
                                </div>
                        </div>
                        @endforeach --}}
                </div>
            </div>
        </section>

        <section class="section-networks" id="networs">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4 my-2 my-md-0 text-center">
                        <img src="{{ asset('assets/img/fasilitas.jpg') }}" class="rounded-circle img-fluid custom-rounded"
                            alt="...">
                        <h4 class="my-2">Tempat Ibadah</h4>
                        <p>Keterbukaan layanan shalat berjamaah selama waktu-waktu shalat memastikan aksesibilitas bagi
                            seluruh umat Muslim untuk memperkuat ikatan keagamaan dan sosial.</p>
                    </div>
                    <div class="col-12 col-md-4 my-2 my-md-0 text-center">
                        <img src="{{ asset('assets/img/fasilitas.jpg') }}" class="rounded-circle img-fluid custom-rounded"
                            alt="...">
                        <h4 class="my-2">Kajian Rutin</h4>
                        <p>Mendalami pemahaman agama dan memperdalam spiritualitas setiap Kamis malam dan Ahad subuh.</p>
                    </div>
                    <div class="col-12 col-md-4 my-2 my-md-0 text-center">
                        <img src="{{ asset('assets/img/fasilitas.jpg') }}" class="rounded-circle img-fluid custom-rounded"
                            alt="...">
                        <h4 class="my-2">Tempat Ibadah</h4>
                        <p>Keterbukaan layanan shalat berjamaah selama waktu-waktu shalat memastikan aksesibilitas bagi
                            seluruh umat Muslim untuk memperkuat ikatan keagamaan dan sosial.</p>
                    </div>
                    {{-- <div class="col-md-4">
                        <h2>Our Networks</h2>
                        <p>Companies are trusted us
                            <br>
                            more than just a trip
                        </p>
                    </div>
                    <div class="col-md-8 text-center">
                        <img src="frontend/images/partner.png" alt="Logo Partner" class="img-partner">
                    </div> --}}
                </div>
            </div>
        </section>

        <section class="section-infaq" id="infaq">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="infaq-content">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <img src="{{ asset('assets/img/qr.png') }}" class="img-fluid h-auto" width="480px"
                                        alt="">
                                </div>
                                <div class="col-12 col-md-8">
                                    <h2 class="mb-2 my-4 my-md-0">{{ $data->infaq_title }}</h2>
                                    {!! $data->infaq_subtitle !!}
                                </div>
                            </div>
                        </div>
                    </div>
        </section>

        <section class="section-testimonial-heading" id="kontak">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>Informasi</h2>
                        {{-- <p>Moments were giving them
                            <br>
                            the best experience
                        </p> --}}
                    </div>
                </div>
            </div>
        </section>

        <section class="section-testimonial-content" id="testimonialcontent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    <div class="col-12">
                        <div class="card card-testimonial">
                            <div class="testimonial-content">
                                {{-- <img src="frontend/images/testi.png" alt="user" class="mb-4 rounded-circle"> --}}
                                <div class="row">
                                    <div class="col-12 col-md-4 my-2 my-md-0">
                                        <h3 class="mb-2">
                                            <img src="{{ asset('assets/img/address.svg') }}" alt="Alamat Icon"
                                                width="32" height="32" class="icon-address"> Alamat
                                        </h3>
                                        <p class="testimonial">
                                            {{ $data->informasi_address }}
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-4 my-2 my-md-0">
                                        <h3 class="mb-2">
                                            <img src="{{ asset('assets/img/phone.svg') }}" alt="Nomor HP Icon"
                                                width="32" height="32" class="icon-address">
                                            Kontak
                                        </h3>
                                        <p class="testimonial">
                                            {{ $data->informasi_phone1 }}
                                        </p>
                                        <p class="testimonial">
                                            {{ $data->informasi_phone2 }}
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-4 my-2 my-md-0">
                                        <h3 class="mb-2">
                                            <img src="{{ asset('assets/img/mail.svg') }}" class="me-1" alt="Email Icon"
                                                width="32" height="32" class="icon-address">
                                            Email
                                        </h3>
                                        <p class="testimonial">
                                            {{ $data->informasi_email }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-12 text-center">
                                <a href="#" class="btn btn-need-help px-4 mx-1">
                                    I Need Help
                                </a>
                                <a href="{{ route('register') }}" class="btn btn-get-started px-4 mx-1">
                                    Kunjungi Masjid
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/testi2.png" alt="user" class="mb-4 rounded-circle">
                                <h3 class="mb-4">Syahmardian</h3>
                                <p class="testimonial">
                                    ”The trip was amazing and I saw something beautiful in that island that makes me want to
                                    learn more”
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to Air Terjun Haratai
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/testi.png" alt="user" class="mb-4 rounded-circle">
                                <h3 class="mb-4">Safaro</h3>
                                <p class="testimonial">
                                    “It was glorious and I could not to say wohooo for every single moments Dankeeee”
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to Teluk Tamiang
                            </p>
                        </div>
                    </div> --}}
                </div>
            </div>

        </section>
    </main>
@endsection
