<div class="col">
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="modaltambah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="width: 50pc;
        margin-top: 4pc;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center">Tambah Buku Rusak</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/tambahrusakpost" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="kategori" class="col-sm-4 col-form-label">Kode Buku :</label>
                            <div class="col-sm-8">
                                <select id="kodebuku" class="form-control @error('kodebuku') is-invalid @enderror"
                                    name="kodebuku" aria-label="Default select example">
                                    <option value="" disabled selected>Pilih Kategori Buku</option>
                                    @foreach ($buku as $row)
                                        <option value="{{ $row->id }}" data-namabuku='{{ $row->namabuku }}'>
                                            {{ $row->kodebuku }}</option>
                                    @endforeach
                                </select>
                                @error('kodebuku')
                                    <div class="invalid-feedback">
                                        Silahkan Pilih No Kode Buku
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-3">
                            <label for="namabuku" class="col-sm-4 col-form-label">Nama Buku :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('namabuku') is-invalid @enderror"
                                    id="namabuku" name="namabuku"  required>
                                @error('namabuku')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-3">
                            <label for="jumlah" class="col-sm-4 col-form-label">Jumlah Buku :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('jumlah') is-invalid @enderror"
                                    id="jumlah" name="jumlah" required>
                                @error('jumlah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button  class="btn btn-info  col-sm-3 mb-0" style="margin-left: 36pc;">
                            <span class="text">Simpan</span>
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
