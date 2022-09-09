<!DOCTYPE html>

<html lang="en" class="light-style  layout-menu-fixed   " dir="ltr" data-theme="theme-default"
    data-assets-path="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/"
    data-base-url="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1"
    data-framework="laravel" data-template="vertical-menu-theme-default-light">


<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/account-settings-account by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Aug 2022 10:55:40 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Perpustakaan || Kita</title>
    <meta name="description"
        content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="0MjIUPhqNgzfdBvHYUi8hPIKT4bCRfWbRTmBQEkI">
    <!-- Canonical SEO -->
    @include('templates.head')
</head>

<body>
    <!-- Layout Content -->
    <div class="layout-wrapper layout-content-navbar ">
        <div class="layout-container">

            @include('templates.sidebar')


            <!-- Layout page -->
            <div class="layout-page">
                <!-- BEGIN: Navbar-->
                <!-- Navbar -->
                @include('templates.navbar')
                <!-- / Navbar -->
                <!-- END: Navbar-->


                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">

                        <h4 class="fw-bold py-3 mb-4">
                            <span class="text-muted fw-light">Account Settings /</span> Account
                        </h4>

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i
                                                class="bx bx-user me-1"></i> Account</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/profile/gantipassword"><i
                                                class="bx bx-lock-alt me-1"></i> Security</a></li>
                                    {{-- <li class="nav-item"><a class="nav-link" href="account-settings-billing.html"><i
                                                class="bx bx-detail me-1"></i> Billing & Plans</a></li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="account-settings-notifications.html"><i class="bx bx-bell me-1"></i>
                                            Notifications</a></li>
                                    <li class="nav-item"><a class="nav-link" href="account-settings-connections.html"><i
                                                class="bx bx-link-alt me-1"></i> Connections</a></li> --}}
                                </ul>
                                <div class="card mb-4">
                                    <h5 class="card-header">Profile Details</h5>
                                    <!-- Account -->
                                    <div class="card-body">
                        
                                            <form class="d-flex align-items-start align-items-sm-center gap-4" action="/editfoto" method="post" enctype="multipart/form-data">
                                                @csrf                                               
                                                <img src="/fotosiswa/{{ Auth::User()->foto}}"
                                                    alt="user-avatar" class="d-block rounded" height="100" width="100"
                                                    id="uploadedAvatar" />
                                                <div class="button-wrapper">
                                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                        <span class="d-none d-sm-block">Upload new photo</span>
                                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                                        <input type="file" id="upload" class="account-file-input"
                                                            hidden accept="image/png, image/jpeg" name="foto" />
                                                    </label>
                                                    <button type="submit"
                                                        class="btn btn-label-secondary account-image-reset mb-4">
                                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Simpan</span>
                                                    </button>
    
                                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                                </div>
                                            </form>
                                    </div>
                                    <hr class="my-0">
                                    <div class="card-body">
                                        <form id="formAccountSettings" method="POST" action="/editprofile" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="mb-3 ">
                                                    <label for="firstName" class="form-label"> NISN</label>
                                                    <input class="form-control" type="text" id="nisn"
                                                        name="nisn" value="{{ Auth::User()->nisn}}" autofocus />
                                                </div>
                                                <div class="mb-3 ">
                                                    <label for="lastName" class="form-label">Nama</label>
                                                    <input class="form-control" type="text" name="name"
                                                        id="name" value="{{ Auth::User()->name}}" />
                                                </div>
                                                <div class="mb-3 ">
                                                    <label for="email" class="form-label">Kelas</label>
                                                    <input class="form-control" type="text" id="email"
                                                        name="kelas" value="{{ Auth::User()->kelas}}"
                                                        placeholder="" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="organization" class="form-label">Email</label>
                                                    <input type="text" class="form-control" id=""
                                                        name="email" value="{{ Auth::User()->email}}" />
                                                </div>
                                                {{-- <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="phoneNumber">Phone Number</label>
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text">US (+1)</span>
                                                        <input type="text" id="phoneNumber" name="phoneNumber"
                                                            class="form-control" placeholder="202 555 0111" />
                                                    </div>
                                                </div> --}}
                                               
                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /Account -->
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Delete Account</h5>
                                    <div class="card-body">
                                        <div class="mb-3 col-12 mb-0">
                                            <div class="alert alert-warning">
                                                <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete
                                                    your account?</h6>
                                                <p class="mb-0">Once you delete your account, there is no going back.
                                                    Please be certain.</p>
                                            </div>
                                        </div>
                                        <form id="formAccountDeactivation" onsubmit="return false">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox"
                                                    name="accountActivation" id="accountActivation" />
                                                <label class="form-check-label" for="accountActivation">I confirm my
                                                    account deactivation</label>
                                            </div>
                                            <button type="submit"
                                                class="btn btn-danger deactivate-account">Deactivate Account</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- pricingModal -->
                        <!--/ pricingModal -->

                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <!-- Footer-->
                    @include('templates.footer')
                    <!--/ Footer-->
                    <!-- / Footer -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!--/ Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->
    <!--/ Layout Content -->



    <!-- Include Scripts -->
    @include('templates.script')

</body>


<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/account-settings-account by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Aug 2022 10:55:42 GMT -->

</html>
