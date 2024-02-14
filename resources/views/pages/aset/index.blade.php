<x-dashboard-layout>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Data Aset Masjid</h3>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <span><i class="ti ti-plus"></i></span>
                        Tambah Aset
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('aset.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-7">
                                                <label class="form-label">Kode</label>
                                                <input type="text" class="form-control" name="kode">
                                            </div>
                                            <div class="col-5">
                                                <label class="form-label">Kategori</label>
                                                <select class="form-select" name="category">
                                                    @forelse ($categories as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @empty
                                                        <option>Tidak ada kategori</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Barang</label>
                                        <input type="text" class="form-control" name="nama">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tahun Pembelian</label>
                                        <input type="number" class="form-control" name="tahun_pembelian">
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-7">
                                                <label class="form-label">Jumlah Barang</label>
                                                <input type="text" class="form-control" name="jumlah">
                                            </div>
                                            <div class="col-5">
                                                <label class="form-label">Satuan</label>
                                                <select class="form-select" name="satuan">
                                                    <option selected>Pilih Satuan</option>
                                                    <option value="meter">Meter</option>
                                                    <option value="buah">Buah</option>
                                                    <option value="lembar">Lembar</option>
                                                    <option value="kg">Kg</option>
                                                    <option value="pcs">Pcs</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Foto Aset</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Kode</th>
                                <th>Nama Aset</th>
                                <th>Kategori</th>
                                <th>Tahun Pembelian</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assets as $item)
                                <tr>
                                    <td>
                                        <img src="{{ Storage::url($item->images->path) }}" alt=""
                                            width="100">
                                    </td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->category->nama }}</td>
                                    <td>{{ $item->tahun_pembelian }}</td>
                                    <td>{{ $item->jumlah }} {{ $item->satuan }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('aset.show', $item->slug) }}" class="btn btn-info m-1">
                                                <span>
                                                    <i class="ti ti-eye"></i>
                                                </span>
                                            </a>
                                            <button type="button" class="btn btn-warning m-1">
                                                <span>
                                                    <i class="ti ti-edit"></i>
                                                </span>
                                            </button>
                                            <form action="{{ route('aset.destroy', $item) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger m-1">
                                                    <span>
                                                        <i class="ti ti-trash"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama Aset</th>
                                <th>Kategori</th>
                                <th>Tahun Pembelian</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

    @push('addon-script')
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
    @endpush
</x-dashboard-layout>
