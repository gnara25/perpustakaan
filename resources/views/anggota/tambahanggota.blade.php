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
						<div class="breadcrumb-title pe-3">Daftar Anggota</div>
						<div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="daftaranggota"><i class='fadeIn animated bx bx-user-circle'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Siswa/TambahSiswa</li>
								</ol>
							</nav>
						</div>
					</div>
                    <div class="card radius-15">
						<div class="card-body">
                            <div class="row">
                                <form action="/tambahanggotapost" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row mb-3">
                                        <label for="nisn" class="col-sm-4 col-form-label">Nisn   :</label>
                                        <div class="col-sm-8">
                                            <input type="number"
                                                class="form-control @error('nisn') is-invalid @enderror"
                                                id="nisn" name="nisn" value="{{ old('nisn') }}" placeholder="Masukan NISN">
                                            @error('nisn')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label class="mb-1" for="nama">Nama Siswa :</label>
                                            <input type="text"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama Siswa">
                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mb-1" for="kelas">Kelas :</label>
                                            <input type="text   "
                                                class="form-control @error('kelas') is-invalid @enderror"
                                                id="kelas" name="kelas" value="{{ old('kelas') }}" placeholder="Masukan Kelas">
                                            @error('kelas')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mb-1" for="tgl_lahir">Tanggal Lahir :</label>
                                            <input type="date"
                                                class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                                            @error('tgl_lahir')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row mb-3">
                                        <label for="alamat" class="col-sm-4 col-form-label">Jenis Kelamin   :</label>
                                        <div class="col-sm-8">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="inlineCheckbox1" value="Laki-Laki" name="jenis_kelamin">
                                              <label class="form-check-label" for="inlineCheckbox1">Laki-Laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="radio" id="inlineCheckbox2" value="Perempuan" name="jenis_kelamin">
                                              <label class="form-check-label" for="inlineCheckbox2">Perempuan</label>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group row mb-3">
                                        <label for="nisn" class="col-sm-4 col-form-label">Email   :</label>
                                        <div class="col-sm-8">
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" value="{{ old('email') }}" placeholder="Masukan Email Anda">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>       
                                    <div class="form-group row mb-3">
                                        <label for="nisn" class="col-sm-4 col-form-label">No.Telpon   :</label>
                                        <div class="col-sm-8">
                                            <input type="number"
                                                class="form-control @error('notelepon') is-invalid @enderror"
                                                id="notelepon" name="notelepon" value="{{ old('notelepon') }}" placeholder="Masukan Email Anda">
                                            @error('notelepon')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>       
                                    <div class="form-group row mb-3">
                                        <label for="alamat" class="col-sm-4 col-form-label">Alamat   :</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('alamat') is-invalid @enderror"
                                                id="alamat" name="alamat" value="{{ old('alamat') }}" placeholder="Masukan Alamat Siswa">
                                            @error('alamat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="foto" class="col-sm-4 col-form-label">Foto Siswa   :</label>
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
                                            <span class="text">Tambah Siswa</span>
                                        </button>
                                        <div class=" mb-3">
                                            <a href="daftaranggota" class="btn btn-dark btn-icon-split mb-3 col-sm-3">
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
