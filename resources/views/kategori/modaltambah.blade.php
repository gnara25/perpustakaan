<div class="col">
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="modaltambah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="width: 50pc;
        margin-top: 4pc;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center">Tambah Kategori Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/tambahkategoripost" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="kategori" class="col-sm-4 col-form-label">Kategori Buku :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                                    id="kategori" name="kategori" value="{{ old('kategori') }}">
                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <button onclick="createmodal()" class="btn btn-info  col-sm-3 mb-0" style="margin-left: 36pc;">
                            <span class="text">Tambah Kategori</span>
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
