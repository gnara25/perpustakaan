
<!DOCTYPE html>
<html lang="en">

@include('template.head')

<body class="bg-login">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="section-authentication-login d-flex align-items-center justify-content-center mt-4">
			<div class="row">
				<div class="col-12 col-lg-8 mx-auto">
					<div class="card radius-15 overflow-hidden">
						<div class="row g-0">
							<div class="col-xl-6">
								<div class="card-body p-5">
									<div class="text-center">
										<img src="assets/images/logo-icon.png" width="80" alt="">
										<h3 class="mt-4 font-weight-bold">Selamat Datang</h3>
									</div>
									<div class="">
										<div class="login-separater text-center mb-4"> <span>Masuk Dengan Email</span>
											<hr>
										</div>
										<div class="form-body">
											<form class="row g-3" action="/logined" class="user" method="POST">
												@csrf
												<div class="col-12">
													@csrf
													<label for="inputEmailAddress" class="form-label">Masukan Email</label>
													<input type="email" name="email" class="form-control" id="inputEmailAddress" placeholder="Masukan Email">
													@error('email')
													<div>{{ $message }}</div>
												@enderror
												</div>
												<div class="col-12">
													<label for="inputChoosePassword" class="form-label">Masukan Password</label>
													<div class="input-group" id="show_hide_password">
														<input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword"  placeholder="Masukan Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
														@error('password')
														<div>{{ $message }}</div>
													@enderror
													</div>
												</div>
												{{-- <div class="col-md-6">
													<div class="form-check form-switch">
														<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
														<label class="form-check-label" for="flexSwitchCheckChecked">Ingat Saya</label>
													</div>
												</div> --}}
												{{-- <div class="col-md-6 text-end">	<a href="authentication-forgot-password.html">Forgot Password ?</a>
												</div> --}}
												<div class="col-12">
													<div class="d-grid">
														<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Masuk</button>
													</div>
													<br>
													<div class="d-grid">
														<a href="/" class="btn btn-primary"><i class="fa-solid fa-backward"></i>Kembali</a>
													</div>
												</div>
												<div class="col-12 text-center">
													<p>Belum punya akun?  <a href="/register">Daftar disini</a></p>
												</div>
												
											</form>
										</div>
									</div>
								</div>
							 </div>
							<div class="col-xl-6 bg-login-color d-flex align-items-center justify-content-center">
								<img src="assets/images/login-images/login-frent-img.jpg" class="img-fluid" alt="...">
							</div>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>

@include('template.script')

<script>
    @if (Session::has('error'))
    toastr.error("{{ Session::get('error') }}")
    @endif
</script>
</html>