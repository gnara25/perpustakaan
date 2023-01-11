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
						<div class="breadcrumb-title border-0">Scanner</div>
					</div>
                    <div class="card radius-15">
						<div class="card-body">
                            <div class="row">
                                <form action="/scannerpost" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row mb-3">
                                        <label for="nisn" class="col-sm-4 col-form-label">Nisn   :</label>
                                        <div class="col-sm-8">
                                            <input type="number" min="0"
                                                class="form-control @error('nisn') is-invalid @enderror"
                                                id="nisn" name="nisn" id="nisn">
                                            @error('nisn')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                  
									<br>
                                    <center>
                                        <div class=" mb-3">
                                            <a href="daftaranggota" class="btn btn-dark btn-icon-split mb-3 col-sm-3">
                                                <span class="text">Kembali</span>
                                            </a>
                                    </center>
                                  
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

    
    <script type="text/javascript">
           @if (Session::has('gagal'))
            swal({
                // position: 'top-end',
                icon: 'warning',
                title: 'Anda Sudah Scan',
                showConfirmButton: false,
                timer: 1500
            });
        @endif

        @if (Session::has('errors'))
            swal({
                // position: 'top-end',
                icon: 'warning',
                title: 'Nisn Anda Salah',
                showConfirmButton: false,
                timer: 3500
            });
        @endif
        @if (Session::has('berhasil'))
            swal({
                icon: "success",
                title: "Anda Berhasil Absensi",
                showConfirmButton: false,
                timer: 3500
            });
        @endif
    </script>
    <script type="text/javascript">
     $(document).ready(function() {
            $('#nisn').val("").focus();
            $('#nisn').keyup(function(e) {
                var tex = $(this).val();
                //  console.log(tex);
                if (tex !== "" && e.keyCode === 13) {

                    $('#nisn').focus();
                }
                e.preventDefault();
                $('form').submit();
            });
           
        });

     
     </>
</body>

</html>
