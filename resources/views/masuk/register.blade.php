
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codervent.com/syndash/demo/horizontal/authentication-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Sep 2022 06:15:35 GMT -->
 @include('template.head')

<body class="bg-register">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="section-authentication-register d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card radius-15 overflow-hidden">
						<div class="row g-0">
							<div class="col-xl-6">
								<div class="card-body p-md-5">
									<div class="text-center">
										<img src="assets/images/logo-icon.png" width="80" alt="">
										<h3 class="mt-4 font-weight-bold">Register Akun</h3>
									</div>
									<div class="">
										<div class="d-grid">
											{{-- <a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
											<img class="me-2" src="assets/images/icons/search.svg" width="16" alt="Image Description">
											<span>Sign Up with Google</span>
												</span>
											</a> <a href="javascript:;" class="btn btn-facebook"><i class="bx bxl-facebook me-1"></i>Sign Up with Facebook</a> --}}
										</div>
										{{-- <div class="login-separater text-center mb-4"> <span>OR SIGN UP WITH EMAIL</span>
											<hr>
										</div> --}}
										<div class="form-body">
                                            <form class="row g-3" action="/registeruser" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-12">
                                                    <label for="inputEmailAddress" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="inputEmailAddress" placeholder="Suhardi" name="username">
													@error('username')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputEmailAddress" class="form-label">Nama Panjang</label>
                                                    <input type="text" class="form-control" id="inputEmailAddress" placeholder="Suhardi" name="name">
													@error('name')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputEmailAddress" class="form-label">No Telepon</label>
                                                    <input type="number" class="form-control" id="inputEmailAddress" placeholder="081732" name="notelepon">
													@error('notelepon')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                    <input type="email" class="form-control" id="inputEmailAddress" placeholder="example@user.com" name="email">
													@error('email')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
                                                </div>
												<div class="col-12">
													<label for="inputChoosePassword" class="form-label">Password</label>
													<div class="input-group" id="show_hide_password">
														<input type="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password" name="password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
													</div>
													@error('password')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="col-12">
													{{-- <div class="form-check form-switch">
														<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
														<label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms &amp; Conditions</label>
													</div> --}}
												</div>
												<div class="col-12">
													<div class="d-grid">
														<button type="submit" class="btn btn-primary"><i class="bx bx-user me-1"></i>Register</button>
													</div>
													<br>
													<div class="d-grid">
														<a href="/login" class="btn btn-primary"><i class="fa-solid fa-backward"></i>Kembali</a>
													</div>
												</div>
											</form>
										</div>
									</div>

								</div>
							</div>
							<div class="col-xl-6 bg-login-color d-flex align-items-center justify-content-center">
								<img src="assets/images/login-images/register-frent-img.jpg" class="img-fluid" alt="...">
							</div>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
	<!-- JavaScript -->
	@include('template.script')
</body>


<!-- Mirrored from codervent.com/syndash/demo/horizontal/authentication-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Sep 2022 06:15:36 GMT -->
</html>
