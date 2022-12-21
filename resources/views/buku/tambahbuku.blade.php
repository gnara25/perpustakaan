<!DOCTYPE html>
<html lang="en">

    @include('template.head')

<style type="text/css">
    .foto {
        text-align: center;
    }
    input{
        display: none;
    }
    img.image-preview{
        max-width: 100px;
        margin-bottom: 2%;
		display: none;
    }
    /* label.image-button{
        display: block;
    } */
    .ngengkel{
        display: block !important;
    }
    span.change-image{
        display: none;
		text-align: left;
		cursor: pointer;
    }

</style>

<body>
    @include('template.sidebar')

    @include('template.navbar')
	<!-- wrapper -->
	<div class="wrapper">



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
									<li class="breadcrumb-item"><a href="buku"><i class='fadeIn animated bx bx-list-ul'></i></a>
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
                                        <label for="kodebuku" class="col-sm-4 col-form-label">Kode Buku   :</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('kodebuku') is-invalid @enderror"
                                                id="kodebuku" name="kodebuku" value="{{ 'KDB-' . $kd }}" readonly >
                                            @error('kodebuku')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="namabuku">Nama Buku  :</label>
                                            <input type="text"
                                                class="form-control @error('namabuku') is-invalid @enderror"
                                                id="nama" name="namabuku" value="{{ old('namabuku') }}" placeholder="Nama Buku">
                                            @error('namabuku')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="kategori">Kategori Buku :</label>
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
                                    <br>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label for="penulis">Penulis :</label>
                                            <input type="text"
                                                class="form-control @error('penulis') is-invalid @enderror"
                                                id="penulis" name="penulis" value="{{ old('penulis') }}" placeholder="Penulis Buku">
                                            @error('penulis')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="penerbit">Penerbit :</label>
                                            <input type="text"
                                                class="form-control @error('penerbit') is-invalid @enderror"
                                                id="penerbit" name="penerbit" value="{{ old('penerbit') }}" placeholder="Penerbit Buku">
                                            @error('penerbit')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tahunterbit">Tahun Terbit :</label>
                                            <input type="number"
                                                class="form-control @error('tahunterbit') is-invalid @enderror"
                                                id="tahunterbit" name="tahunterbit" value="{{ old('tahunterbit') }}" placeholder="Tahun Terbit">
                                            @error('tahunterbit')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="halbuku">Halaman Buku  :</label>
                                            <input type="number"
                                                class="form-control @error('halbuku') is-invalid @enderror"
                                                id="halbuku" name="halbuku" value="{{ old('halbuku') }}" placeholder="Halaman Buku">
                                                @error('halbuku')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="jumlah">Jumlah Buku :</label>
                                            <input type="number" min="1"
                                                class="form-control @error('jumlah') is-invalid @enderror"
                                                id="jumlah" name="jumlah" value="{{ old('jumlah') }}" placeholder="Jumlah Buku">
                                            @error('jumlah')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row mb-3">
                                        <label for="lokasibuku" class="col-sm-4 col-form-label">Lokasi Buku   :</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('lokasibuku') is-invalid @enderror"
                                                id="lokasibuku" name="lokasibuku" value="{{ old('lokasibuku') }}" placeholder="Lokasi Buku">
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
                                        <label for="foto" class="image-button col-sm-4 col-form-label ngengkel">Foto Buku   :</label>
                                        <div class="col-sm-8">

                                            <img src="" class="image-preview" >
                                            <input type="file" accept="image/*" id="foto"
                                                class="form-control @error('foto') is-invalid @enderror"
                                                 name="foto" value="{{ old('foto') }}">

                                            @error('foto')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
									<br>
                                    <center> <button type="submit"
                                            class="btn btn-info btn-icon-split col-sm-3 mb-3">
                                            <span class="text">Tambah Buku</span>
                                        </button>
                                        <div class=" mb-3">
                                            <a href="/buku" class="btn btn-dark btn-icon-split mb-3 col-sm-3">
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

    <script>
        $('#foto').on('change', function() {
            $input = $(this);
            if ($input.val().length > 0) {
                fileReader = new FileReader();
                fileReader.onload = function(data) {
                    $('.image-preview').attr('src', data.target.result);
                }
                fileReader.readAsDataURL($input.prop('files')[0]);
                $('.image-button').css('display', 'none');
                $('.image-preview').css('display', 'block');
                $('.change-image').css('display', 'block');
            }
        });

        $('.change-image').on('click', function() {
            $control = $(this);
            $('#foto').val('');
            $preview = $('.image-preview');
            $preview.attr('src', '');
            $preview.css('display', 'none');
            $control.css('display', 'none');
            $('.image-button').css('display', 'block');
        });
    </script>

</body>

</html>
