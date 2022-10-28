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
						<div class="breadcrumb-title pe-3">Menu Buku</div>
						<div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="kategori"><i class='fadeIn animated bx bx-book-alt'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">KategoriBuku/TambahKategori</li>
								</ol>
							</nav>
						</div>
					</div>
                    <div class="card radius-15">
						<div class="card-body">
                            <div class="row">
                                <form action="/tambahkategoripost" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row mb-3">
                                        <label for="kategori" class="col-sm-4 col-form-label">Kategori Buku   :</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('kategori') is-invalid @enderror"
                                                id="kategori" name="kategori" value="{{ old('kategori') }}">
                                            @error('kategori')
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
                                            <span class="text">Tambah Kategori</span>
                                        </button>
                                        <div class=" mb-3">
                                            <a href="kategori" class="btn btn-dark btn-icon-split mb-3 col-sm-3">
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
