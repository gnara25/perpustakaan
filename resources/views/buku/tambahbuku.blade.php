<!DOCTYPE html>
<html lang="en">

@include('template.head')

<body>
	<!-- wrapper -->
	<div class="wrapper">

        @include('template.navbar')

		@include('template.sidebar')

		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			
			<div class="page-content-wrapper">
				<div class="page-content">
                    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Tambah Buku</div>
						<div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="beranda"><i class='bx bx-home-alt'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Daftar Buku/Tambah Buku</li>
								</ol>
							</nav>
						</div>
					</div>
                    <div class="card radius-15">
						<div class="card-body">
                            <div class="row">
                                <form action="/tambahbukupost" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row mb-3">
                                        <label for="nama" class="col-sm-4 col-form-label">Judul Buku   :</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('namabuku') is-invalid @enderror"
                                                id="nama" name="namabuku" value="{{ old('namabuku') }}">
                                            @error('namabuku')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="kategori" class="col-sm-4 col-form-label">Kategori Buku   :</label>
                                        <div class="col-sm-8">
                                                <select class="form-control @error('kategori') is-invalid @enderror"
                                                name="kategori" aria-label="Default select example" >
                                                <option value="" disabled selected>Pilih Kategori Buku</option>
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
                                                id="kodebuku" name="kodebuku" value="{{ old('kodebuku') }}">
                                            @error('kodebuku')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="penulis" class="col-sm-4 col-form-label">Penulis   :</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('penulis') is-invalid @enderror"
                                                id="penulis" name="penulis" value="{{ old('penulis') }}">
                                            @error('penulis')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="penerbit" class="col-sm-4 col-form-label">Penerbit   :</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('penerbit') is-invalid @enderror"
                                                id="penerbit" name="penerbit" value="{{ old('penerbit') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="tahunterbit" class="col-sm-4 col-form-label">Tahun Terbit   :</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('tahunterbit') is-invalid @enderror"
                                                id="tahunterbit" name="tahunterbit" value="{{ old('tahunterbit') }}">
                                           
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="halbuku" class="col-sm-4 col-form-label">Halaman Buku   :</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('halbuku') is-invalid @enderror"
                                                id="halbuku" name="halbuku" value="{{ old('halbuku') }}">
                                           
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="jumlah" class="col-sm-4 col-form-label">Jumlah Buku   :</label>
                                        <div class="col-sm-8">
                                            <input type="number" min="1"
                                                class="form-control @error('jumlah') is-invalid @enderror"
                                                id="jumlah" name="jumlah" value="{{ old('jumlah') }}">
                                            @error('jumlah')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="lokasibuku" class="col-sm-4 col-form-label">Lokasi Buku   :</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('lokasibuku') is-invalid @enderror"
                                                id="lokasibuku" name="lokasibuku" value="{{ old('lokasibuku') }}">
                                            @error('lokasibuku')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi  :</label>
                                        <div class="col-sm-8">
                                            <textarea type="text"
                                                class="form-control @error('deskripsi') is-invalid @enderror"
                                                id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}"></textarea>
                                            @error('deskripsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="foto" class="col-sm-4 col-form-label">Foto Buku   :</label>
                                        <div class="col-sm-8">
                                            <input type="file"
                                                class="form-control @error('foto') is-invalid @enderror"
                                                id="foto" name="foto" value="{{ old('foto') }}">
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
                                            <span class="text">Tambah Buku</span>
                                        </button>
                                        <div class=" mb-3">
                                            <a href="/buku" class="btn btn-dark btn-icon-split mb-3 col-sm-3">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-arrow-circle-left"></i>
                                                </span>
                                                <span class="text">Kembali</span>
                                            </a>
                                    </center>
                                    {{-- <button type="submit"  class="btn btn-primary">Tambah</button>
                                <a href="pemasukan" class="btn btn-primary fas fa-arrow-circle-left">Kembali</a> --}}
                                </form>
                            </div>
                        </div>
                    </div>        
				</div>
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
		<!--start overlay-->
		<div class="overlay toggle-btn-mobile"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		@include('template.footer')
	</div>
	<!-- end wrapper -->
	@include('template.script')
</body>

</html>
