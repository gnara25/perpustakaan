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
						<div class="breadcrumb-title pe-3">Peminjaman</div>
						<div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
								</ol>
							</nav>
						</div>
					</div>
                    <div class="card radius-15">
						<div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>                                         
                                            <th>Nama Buku </th>
                                            <th>kelas</th>
                                            <th>Nama Buku</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $data as $row )
        
                                        <tr>
                                            <td>{{$row->nama}}</td>
                                            <td>{{$row->kelas}}</td>
                                            <td>{{$row->namabuku}}</td>
                                            <td>{{$row->tanggalpeminjaman}}</td>
                                            <td>{{$row->tanggalpengebalian}}</td>
                                            <td>{{$row->jumlah}}</td>
                                        </tr>
                                        @endforeach
        
                                    </tbody>
                                </table>
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
