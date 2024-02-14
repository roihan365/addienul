<x-dashboard-layout>

    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Kategori Aset</h3>
                </div>
                <div class="card-body">
                    <form id="tambahKategori" method="POST" action="{{ route('kategori.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-4 mb-3">
                                <input type="text" class="form-control" id="kategori" name="nama"
                                    autocomplete="off" placeholder="Masukkan Kategori Baru">
                            </div>
                            <div class="col-12 col-md-2 mb-3">
                                <button type="submit" class="btn btn-primary" id="simpanKategori">Tambah
                                    Kategori</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button type="button" class="btn btn-warning m-1 btn-edit"
                                                data-bs-toggle="modal" data-bs-target="#editModal"
                                                data-id="{{ $item->id }}" data-name="{{ $item->nama }}">
                                                <span>
                                                    <i class="ti ti-edit"></i>
                                                </span>
                                            </button>
                                            <form action="{{ route('kategori.destroy', $item) }}" method="POST">
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
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editModalLabel">Edit Kategori</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editForm" method="POST" action="{{ route('kategori.update', '') }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label class="form-label">Nama Kategori</label>
                                        <input type="text" class="form-control" id="editNama" name="nama">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="editKategori" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const editButtons = document.querySelectorAll('.btn-edit');

                editButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        const categoryId = this.getAttribute('data-id');
                        const categoryName = this.getAttribute('data-name');
                        const editForm = document.getElementById('editForm');
                        const editNama = document.getElementById('editNama');
                        const simpanEditBtn = document.getElementById('simpanEdit');

                        // Set value to input
                        editNama.value = categoryName;

                        // Update action URL of the form
                        editForm.action = "{{ route('kategori.update', '') }}" + '/' + categoryId;
                    });
                });
            });
        </script>
    @endpush
</x-dashboard-layout>
