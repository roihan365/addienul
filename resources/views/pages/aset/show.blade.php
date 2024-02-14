@extends('layouts.app')

@section('title')
    Masjid Ad-Dienul Amin
@endsection

@section('content')
    <div class="container">
        {{-- justify-content-center = agar posisi row ditengah --}}
        <div class="row my-3 justify-content-center ">
            <div class="col-lg-8">
                <h1 class="mb-3">Aset : {{ $asset->nama }}</h1>

                {{-- <a href="{{ route('aset.index') }}" class="btn btn-success">
                    <span data-feather="arrow-left"></span> Kembali</a> --}}

                <div class="row">
                    <div class="col-12 text-center">
                        @if ($asset->images)
                            <div style="max-height: 350px; overflow:hidden;">
                                <img width="250" src="{{ Storage::url($asset->images->path) }}" alt="{{ $asset->nama }}"
                                    class="img-fluid mt-3 img-thumbnail">
                            </div>
                        @endif
                    </div>
                    {{-- <div class="col-md-4">
                        @if ($asset->gambar_qr)
                            <div style="max-height: 350px; overflow:hidden;">
                                <img width="150" src="{{ asset('storage/' . $asset->gambar_qr) }}"
                                    class="img-fluid mt-3 img-thumbnail">
                            </div>
                        @endif
                    </div> --}}
                </div>

                <table class="table table-striped mt-3">
                    <tbody>
                        <tr>
                            <td>Kode</td>
                            <td>{{ $asset->kode }}</td>
                        </tr>
                        <tr>
                            <td>Nama Barang</td>
                            <td>{{ $asset->nama }}</td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>{{ $asset->category->nama }}</td>
                        </tr>
                        <tr>
                            <td>Tahun Pembelian</td>
                            <td>{{ $asset->tahun_pembelian }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah</td>
                            <td>{{ $asset->jumlah }} {{ $asset->satuan }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
