<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Perpusatakaan || Kita</title>
        <!--favicon-->
        <link rel="icon" href="{{asset('assets/images/favicon-32x32.png')}}" type="image/png" />
        <!--plugins-->
        <link href="{{asset('assets/plugins/simplebar/css/simplebar.css" rel="stylesheet')}}" />
        <link href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
        <!-- loader-->
        <link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet" />
        <script src="{{asset('assets/js/pace.min.js')}}"></script>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&amp;family=Roboto&amp;display=swap" />
        <!-- Icons CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/icons.css')}}"/>
        <!-- App CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/app.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/dark-sidebar.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/css/dark-theme.css')}}"/>

        <!-- sweetAlert -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
                integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
                crossorigin="anonymous" referrerpolicy="no-referrer">
        <!-- Toaster -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- data tabel -->

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
    </head>
{{-- @include('template.head') --}}

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
						<div class="breadcrumb-title pe-3"></div>
						<div class="ps-3">
							{{-- <nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="beranda"><i class='bx bx-home-alt'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Daftar Buku/Edit Buku</li>
								</ol>
							</nav> --}}
						</div>
					</div>
                    <div class="row">
						<div class="col-xl-7 mx-auto">
							{{-- <h6 class="mb-0 text-uppercase">Tambah Kategori</h6>
							<hr> --}}
						<div class="card border-top border-0 border-4 border-primary">
								<div class="card-body p-5">
									<div class="card-title align-items-center">
										{{-- <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
										</div> --}}
										<h5 class="mb-0 text-primary text-center">Edit Buku</h5>
									</div>
									<hr>
									<form class="row g-3" action="/editbukupost/{{$data->id}}" method="post" enctype="multipart/form-data">
                                        @csrf
										<div class="md-6">
											<label for="inputFirstName" class="form-label">Nama</label>
											<input type="text" class="form-control" id="inputFirstName" name="nama" value="{{$data->nama}}">
                                            @error('nama')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
										</div>
                                        <div class="md-6">
                                            <label for="exampleInputEmail1" class="form-label">Kategori</label>
                                            <br />
                                            <select class="form-control @error('kategori') is-invalid @enderror"
                                                name="kategori" aria-label="Default select example" >
                                                <option value="{{$data->idkategori->id}}" >{{$data->idkategori->kategori}}</option>
                                                @foreach ($idkategori as $kategori)
                                                    <option value="{{ $kategori->id }}">
                                                        {{ $kategori->kategori }}</option>
                                                @endforeach
                                            </select>
                                            @error('nokamar')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
										<div class="md-6">
											<label for="inputFirstName" class="form-label">Kode Buku</label>
											<input type="text" class="form-control" id="inputFirstName" name="kodebuku" value="{{$data->kodebuku}}">
                                            @error('kodebuku')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
										</div>
										<div class="md-6">
											<label for="inputFirstName" class="form-label">Penerbit</label>
											<input type="text" class="form-control" id="inputFirstName" name="penerbit" value="{{$data->penerbit}}">
                                            @error('penerbit')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
										</div>
										<div class="md-6">
											<label for="inputFirstName" class="form-label">Tahun Terbit</label>
											<input type="number" class="form-control" id="inputFirstName" name="tahunterbit" value="{{$data->tahunterbit}}">
                                            @error('tahunterbit')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
										</div>
										<div class="md-6">
											<label for="inputFirstName" class="form-label">Jumlah Buku</label>
											<input type="number" class="form-control" id="inputFirstName" name="jumlah" value="{{$data->jumlah}}">
                                            @error('jumlah')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
										</div>
										<div class="md-6">
											<label for="inputFirstName" class="form-label">Foto</label>
                                            </br>
                                            <img class="img mb-3" src="{{ asset('fotobuku/' . $data->foto) }}" alt=""
                                            style="width: 200px; height: 200px;">
											<input type="file" class="form-control" id="inputFirstName" name="foto">
                                            @error('foto')
                                            <div class="invalid-feedback">
                                                {{$message}}
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
		{{-- @include('template.footer') --}}
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
	{{-- @include('template.script') --}}
    <!-- Include Scripts -->
<!-- JavaScript -->

<!--data table -->

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>

<!-- Bootstrap JS -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

<!--plugins-->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<!-- Vector map JavaScript -->
<script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-in-mill.js')}}"></script>
<script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
<script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-uk-mill-en.js')}}"></script>
<script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-au-mill.js')}}"></script>
<script src="{{asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/js/index.js')}}"></script>
<!-- App JS -->
<script src="{{asset('assets/js/app.js')}}"></script>
<script>
    new PerfectScrollbar('.dashboard-social-list');
    new PerfectScrollbar('.dashboard-top-countries');
</script>

<!--Password show & hide js -->
<script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });
</script>
<!-- Toaster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--delete -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>
