<x-dashboard-layout>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Hero Section</h5>
                    <div class="card">
                        <div class="card-body">
                            <form id="form-hero" action="{{ route('web.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Background Foto</label>
                                    <input type="file" class="form-control" name="hero_background">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Header</label>
                                    <input type="text" class="form-control" value="{{ $data->hero_title }}"
                                        name="hero_title">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Paragraf</label>
                                    <input type="text" class="form-control" value="{{ $data->hero_subtitle }}"
                                        name="hero_subtitle">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Teks Tombol</label>
                                    <input type="text" class="form-control" value="{{ $data->hero_button_text }}"
                                        name="hero_button_text">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tujuan Tombol</label>
                                    <input type="text" class="form-control" value="{{ $data->hero_button_url }}"
                                        name="hero_button_url">
                                </div>
                                <button type="submit" class="btn btn-primary" form="form-hero">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Kajian</h5>
                    <div class="card">
                        <div class="card-body">
                            <form id="kajian" action="{{ route('web.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Header</label>
                                    <input type="text" class="form-control" value="{{ $data->kajian_title }}"
                                        name="kajian_title">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Paragraf</label>
                                    <input type="text" class="form-control" value="{{ $data->kajian_subtitle }}"
                                        name="kajian_subtitle">
                                </div>
                                <button type="submit" class="btn btn-primary" form="kajian">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Infaq Section</h5>
                    <div class="card">
                        <div class="card-body">
                            <form id="infaq" action="{{ route('web.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Header</label>
                                    <input type="text" class="form-control" value="{{ $data->infaq_title }}"
                                        name="infaq_title">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Paragraf</label>
                                    <input type="text" class="form-control" value="{{ $data->infaq_subtitle }}"
                                        name="infaq_subtitle">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Foto QR Code</label>
                                    <input type="file" class="form-control" name="infaq_image">
                                </div>
                                <button type="submit" class="btn btn-primary" form="infaq">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Informasi Section</h5>
                    <div class="card">
                        <div class="card-body">
                            <form id="kontak" action="{{ route('web.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control"
                                        value="{{ $data->informasi_address }}" name="informasi_address">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kontak 1</label>
                                    <input type="text" class="form-control" value="{{ $data->informasi_phone1 }}"
                                        name="informasi_phone1">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kontak 2</label>
                                    <input type="text" class="form-control" value="{{ $data->informasi_phone2 }}"
                                        name="informasi_phone2">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" value="{{ $data->informasi_email }}"
                                        name="informasi_email">
                                </div>
                                <button type="submit" class="btn btn-primary" form="kontak">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
