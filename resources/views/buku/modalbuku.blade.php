<div class="col">
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleExtraLargeModal{{$row->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center">Edit Daftar Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="/editbukupost/{{$row->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="nama" class="col-sm-4 col-form-label">Nama Buku   :</label>
                            <div class="col-sm-8">
                                <input type="text"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" value="{{$row->nama}}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="kategori" class="col-sm-4 col-form-label">Kategori Buku   :</label>
                            <div class="col-sm-8">
                                    <select class="form-control @error('kategori') is-invalid @enderror"
                                    name="kategori" aria-label="Default select example" >
                                    @foreach ($idkategori as $kategori)
                                        <option value="{{ $kategori->id }}">
                                            {{ $kategori->kategori }}</option>
                                    @endforeach
                                </select>
                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="kodebuku" class="col-sm-4 col-form-label">Kode Buku   :</label>
                            <div class="col-sm-8">
                                <input type="text"
                                    class="form-control @error('kodebuku') is-invalid @enderror"
                                    id="kodebuku" name="kodebuku" value="{{$row->kodebuku}}">
                                @error('kodebuku')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="penerbit" class="col-sm-4 col-form-label">Penerbit   :</label>
                            <div class="col-sm-8">
                                <input type="text"
                                    class="form-control @error('penerbit') is-invalid @enderror"
                                    id="penerbit" name="penerbit" value="{{$row->penerbit}}">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tahunterbit" class="col-sm-4 col-form-label">Tahun Terbit   :</label>
                            <div class="col-sm-8">
                                <input type="text"
                                    class="form-control @error('tahunterbit') is-invalid @enderror"
                                    id="tahunterbit" name="tahunterbit" value="{{$row->tahunterbit}}">

                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="jumlah" class="col-sm-4 col-form-label">Jumlah Buku   :</label>
                            <div class="col-sm-8">
                                <input type="number"
                                    class="form-control @error('jumlah') is-invalid @enderror"
                                    id="jumlah" name="jumlah" value="{{$row->jumlah}}">
                                @error('jumlah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="foto" class="col-sm-4 col-form-label">Foto Buku   :</label>
                            <div class="col-sm-8">
                                <img class="img mb-3" src="{{ asset('fotobuku/' . $row->foto) }}" alt=""
                                style="width: 100px; height: 100px;">
                                <input type="file"
                                    class="form-control @error('foto') is-invalid @enderror"
                                    id="foto" name="foto">
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <center> <button type="submit"
                                class="btn btn-info btn-icon-split col-sm-3 mb-3">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus-circle"></i>
                                </span>
                                <span class="text">Edit Buku</span>
                            </button>

                        </center>
                        {{-- <button type="submit"  class="btn btn-primary">Tambah</button>
                    <a href="pemasukan" class="btn btn-primary fas fa-arrow-circle-left">Kembali</a> --}}
                    </form>
                        {{-- <button type="submit"  class="btn btn-primary">Tambah</button>
                    <a href="pemasukan" class="btn btn-primary fas fa-arrow-circle-left">Kembali</a> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
