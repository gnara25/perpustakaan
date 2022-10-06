<div class="col">
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleExtraLargeModal{{$row->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center">Edit Anggota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="/editanggotapost/{{$row->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="nama" class="col-sm-4 col-form-label">NISN   :</label>
                            <div class="col-sm-8">
                                <input type="number"
                                    class="form-control @error('nisn') is-invalid @enderror"
                                    id="nisn" name="nisn" value="{{$row->nisn}}">
                                @error('nisn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="kategori" class="col-sm-4 col-form-label">Nama Siswa   :</label>
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
                            <label for="kodebuku" class="col-sm-4 col-form-label">Tanggal Lahir  :</label>
                            <div class="col-sm-8">
                                <input type="date"
                                    class="form-control @error('tgl_lahir') is-invalid @enderror"
                                    id="tgl_lahir" name="tgl_lahir" value="{{$row->tgl_lahir}}">
                                @error('tgl_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="penerbit" class="col-sm-4 col-form-label">Kelas   :</label>
                            <div class="col-sm-8">
                                <input type="text"
                                    class="form-control @error('kelas') is-invalid @enderror"
                                    id="kelas" name="kelas" value="{{$row->kelas}}">
                                    @error('kelas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tahunterbit" class="col-sm-4 col-form-label">Alamat   :</label>
                            <div class="col-sm-8">
                                <input type="text"
                                    class="form-control @error('alamat') is-invalid @enderror"
                                    id="alamat" name="alamat" value="{{$row->alamat}}">
                                    @error('alamat')
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
                                <span class="text">Edit Anggota</span>
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
