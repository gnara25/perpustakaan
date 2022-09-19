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
						<div class="breadcrumb-title pe-3">Daftar Buku</div>
						<div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Daftar Buku</li>
								</ol>
							</nav>
						</div>
					</div>
                    <div class="card radius-15">
						<div class="card-body">
                            <a href="/tambahbuku" class="btn btn-success mb-3">tambah Buku</a>
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nama Buku </th>
                                            <th>Kategori Buku</th>
                                            <th>Kode Buku</th>
                                            <th>Penerit</th>
                                            <th>Tahun Terbit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ( $data as $row )

                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>  <img src="{{asset('fotobuku/'.$row->foto)}}" alt="" style="width: 100px; height: 100px"></td>
                                            <td>{{$row->nama}}</td>
                                            <td>{{$row->idkategori->kategori}}</td>
                                            <td>{{$row->kodebuku}}</td>
                                            <td>{{$row->penerbit}}</td>
                                            <td>{{$row->tahunterbit}}</td>
                                            <td class="c">
                                                <a href="/editbuku/{{ $row->id }}"
                                                    class="btn btn-success">
                                                    <i class="fa-solid fa-square-pen"></i></a>
                                                <a href="#" class="btn btn-danger delete"
                                                    data-id="{{ $row->id }}"
                                                    data-kategori="{{ $row->nama }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </td>
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
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>

    <script>
        $('.delete').click(function() {
            var mahasiswaid = $(this).attr('data-id');
            var kategori = $(this).attr('data-kategori');
            swal({
                    title: "YAKIN?",
                    text: "Akan Menghapus Data Dengan Kategori " + kategori + " ",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/deletebuku/" + mahasiswaid + ""
                        swal("Data Ini Berhasil Dihapus!", {
                            icon: "success",
                        });
                    } else {
                        swal("Data Ini Tidak Jadi Dihapus!");
                    }
                });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>
