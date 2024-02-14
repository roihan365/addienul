<x-dashboard-layout>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Ubah Data Kajian Rutin Mesjid</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('kajian.update', $study->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-7">
                                    <label class="form-label">Judul Kajian</label>
                                    <input type="text" class="form-control" value="{{ $study->nama_kajian }}"
                                        name="nama_kajian">
                                </div>
                                <div class="col-5">
                                    <label class="form-label">Tanggal dan Waktu</label>
                                    <input type="datetime-local" class="form-control"
                                        value="{{ $study->tanggal_kajian }}" name="tanggal_kajian">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pemateri</label>
                            <input type="text" class="form-control" value="{{ $study->pemateri }}" name="pemateri">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Singkat</label>
                            <textarea class="form-control" name="deskripsi" id="" cols="30" rows="3">{{ $study->deskripsi }}</textarea>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-7">
                                    <label class="form-label">Link Live Streaming</label>
                                    <input type="text" class="form-control" value="{{ $study->url_live }}"
                                        name="url_live">
                                </div>
                                <div class="col-5">
                                    <label class="form-label">Poster Kajian</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</x-dashboard-layout>
