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
						<div class="breadcrumb-title pe-3">Edit Buku</div>
						<div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="beranda"><i class='bx bx-home-alt'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Daftar Buku/Edit Buku</li>
								</ol>
							</nav>
						</div>
					</div>
                    <div class="row">
						<div class="col-xl-7 mx-auto">
							{{-- <h6 class="mb-0 text-uppercase">Tambah Kategori</h6>
							<hr> --}}
						<div class="card border-top border-0 border-4 border-primary">
								<div class="card-body p-5">
									<div class="card-title d-flex align-items-center">
										{{-- <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
										</div> --}}
										<h5 class="mb-0 text-primary">edit Buku</h5>
									</div>
									<hr>
									<form class="row g-3" action="/editbukupost/{{$data->id}}" method="post" enctype="multipart/form-data">
                                        @csrf
										<div class="md-6">
											<label for="inputFirstName" class="form-label">Nama</label>
											<input type="text" class="form-control" id="inputFirstName" name="nama" value="{{$data->nama}}">
                                            @error('nama')
                                            <div class="invalid-feedback">
                                                Silahkan Isi Nama
                                            </div>
                                        @enderror
										</div>
                                        <div class="md-6">
                                            <label for="exampleInputEmail1" class="form-label">Kategori</label>
                                            <br />
                                            <select class="form-control @error('kategori') is-invalid @enderror"
                                                name="kategori" aria-label="Default select example" >
                                                <option value="{{$data->idkategori->id}}" >{{$data->idkategori->kategoti}}</option>
                                                @foreach ($idkategori as $kategori)
                                                    <option value="{{ $kategori->id }}">
                                                        {{ $kategori->kategori }}</option>
                                                @endforeach
                                            </select>
                                            @error('nokamar')
                                                <div class="invalid-feedback">
                                                    Silahkan Pilih Kategori
                                                </div>
                                            @enderror
                                        </div>
										<div class="md-6">
											<label for="inputFirstName" class="form-label">Kode Buku</label>
											<input type="text" class="form-control" id="inputFirstName" name="kodebuku" value="{{$data->kodebuku}}">
                                            @error('kodebuku')
                                            <div class="invalid-feedback">
                                                Silahkan Pilih No Villa
                                            </div>
                                        @enderror
										</div>
										<div class="md-6">
											<label for="inputFirstName" class="form-label">Penerbit</label>
											<input type="text" class="form-control" id="inputFirstName" name="penerbit" value="{{$data->penerbit}}">
                                            @error('penerbit')
                                            <div class="invalid-feedback">
                                                Silahkan Pilih No Villa
                                            </div>
                                        @enderror
										</div>
										<div class="md-6">
											<label for="inputFirstName" class="form-label">Tahun Terbit</label>
											<input type="number" class="form-control" id="inputFirstName" name="tahunterbit" value="{{$data->tahunterbit}}">
                                            @error('tahunterbit')
                                            <div class="invalid-feedback">
                                                Silahkan Pilih No Villa
                                            </div>
                                        @enderror
										</div>
										<div class="md-6">
											<label for="inputFirstName" class="form-label">Jumlah Buku</label>
											<input type="number" class="form-control" id="inputFirstName" name="jumlah" value="{{$data->jumlah}}">
                                            @error('jumlah')
                                            <div class="invalid-feedback">
                                                Silahkan Pilih No Villa
                                            </div>
                                        @enderror
										</div>
										<div class="md-6">
											<label for="inputFirstName" class="form-label">Foto</label>
											<input type="file" class="form-control" id="inputFirstName" name="foto">
                                            @error('foto')
                                            <div class="invalid-feedback">
                                                Silahkan Pilih No Villa
                                            </div>
                                        @enderror
										</div>
										<div class="col-12">
											<button type="submit" class="btn btn-primary px-5">Simpan</button>
										</div>
									</form>
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
	{{-- <!--start switcher-->
	<div class="switcher-body">
		<button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bx bx-cog bx-spin"></i></button>
		<div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
		  <div class="offcanvas-header border-bottom">
			<h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
			<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
		  </div>
		  <div class="offcanvas-body">
			<h6 class="mb-0">Theme Variation</h6>
			<hr>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="lightmode" value="option1" checked>
			  <label class="form-check-label" for="lightmode">Light</label>
			</div>
			<hr>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="darkmode" value="option2">
			  <label class="form-check-label" for="darkmode">Dark</label>
			</div>
			  <hr>
			 <div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="inlineRadioOptions" id="ColorLessIcons" value="option3">
				<label class="form-check-label" for="ColorLessIcons">Color Less Icons</label>
			  </div>
		  </div>
		</div>
	   </div>
	   <!--end switcher--> --}}
	@include('template.script')
</body>

</html>
