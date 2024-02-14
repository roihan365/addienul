<x-dashboard-layout>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Data Kajian Rutin Mesjid</h3>
                    <a href="{{ route('kajian.create') }}" class="btn btn-primary">
                        <span><i class="ti ti-plus"></i></span>
                        Tambah Kajian
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Judul Kajian</th>
                                <th>Pemateri</th>
                                <th>Url Live</th>
                                <th>Tanggal Kajian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($studies as $item)
                                <tr>
                                    <td>
                                        <img src="{{ Storage::url($item->image->path) }}" alt="karpet"
                                            class="img-fluid" width="100">
                                    <td>{{ $item->nama_kajian }}</td>
                                    <td>{{ $item->pemateri }}</td>
                                    <td>
                                        <a href="{{ $item->url_live }}" target="_BLANK">Buka Link</a>
                                    </td>
                                    <td>{{ $item->tanggal_kajian }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button type="button" class="btn btn-info m-1">
                                                <span>
                                                    <i class="ti ti-eye"></i>
                                                </span>
                                            </button>
                                            <a href="{{ route('kajian.edit', $item) }}"
                                                class="btn btn-warning m-1 btn-edit">
                                                <span>
                                                    <i class="ti ti-edit"></i>
                                                </span>
                                            </a>
                                            <form action="{{ route('kajian.destroy', $item) }}" method="POST">
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
                                <th>Foto</th>
                                <th>Judul Kajian</th>
                                <th>Pemateri</th>
                                <th>Url Live</th>
                                <th>Tanggal Kajian</th>
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
