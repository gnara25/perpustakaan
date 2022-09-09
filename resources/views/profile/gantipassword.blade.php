<!DOCTYPE html>

<html lang="en" class="light-style  layout-menu-fixed   " dir="ltr" data-theme="theme-default"
    data-assets-path="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/"
    data-base-url="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1"
    data-framework="laravel" data-template="vertical-menu-theme-default-light">


<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/account-settings-security by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Aug 2022 10:55:42 GMT -->
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
                            <span class="text-muted fw-light">Account Settings /</span> Security
                        </h4>

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                    <li class="nav-item"><a class="nav-link" href="/profile/edit"><i
                                                class="bx bx-user me-1"></i> Account</a></li>
                                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i
                                                class="bx bx-lock-alt me-1"></i> Security</a></li>
                                    {{-- <li class="nav-item"><a class="nav-link" href="account-settings-billing.html"><i
                                                class="bx bx-detail me-1"></i> Billing & Plans</a></li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="account-settings-notifications.html"><i class="bx bx-bell me-1"></i>
                                            Notifications</a></li>
                                    <li class="nav-item"><a class="nav-link" href="account-settings-connections.html"><i
                                                class="bx bx-link-alt me-1"></i> Connections</a></li> --}}
                                </ul>
                                <!-- Change Password -->
                                <div class="card mb-4">
                                    <h5 class="card-header">Change Password</h5>
                                    <div class="card-body">
                                        <form id="formAccountSettings" method="POST" action="/editpassword" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="mb-3 col-md-6 form-password-toggle">
                                                    <label class="form-label" for="old_password">
                                                        Password lama</label>
                                                    <div class="input-group input-group-merge">
                                                        <input class="form-control" type="password"
                                                            name="old_password" id="old_password"
                                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                        <span class="input-group-text cursor-pointer"><i
                                                                class="bx bx-hide"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6 form-password-toggle">
                                                    <label class="form-label" for="password">Password Baru</label>
                                                    <div class="input-group input-group-merge">
                                                        <input class="form-control" type="password" id="password"
                                                            name="password"
                                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                        <span class="input-group-text cursor-pointer"><i
                                                                class="bx bx-hide"></i></span>
                                                    </div>
                                                </div>

                                                <div class="mb-3 col-md-6 form-password-toggle">
                                                    <label class="form-label" for="password_confirmation">Confirm
                                                        Password Baru</label>
                                                    <div class="input-group input-group-merge">
                                                        <input class="form-control" type="password"
                                                            name="password_confirmation" id="password_confirmation"
                                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                        <span class="input-group-text cursor-pointer"><i
                                                                class="bx bx-hide"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-4">
                                                    <p class="fw-semibold mt-2">Password Requirements:</p>
                                                    <ul class="ps-3 mb-0">
                                                        <li class="mb-1">
                                                            Minimum 8 characters long - the more, the better
                                                        </li>
                                                        <li class="mb-1">At least one lowercase character</li>
                                                        <li>At least one number, symbol, or whitespace character</li>
                                                    </ul>
                                                </div>
                                                <div class="col-12 mt-1">
                                                    <button type="submit" class="btn btn-primary me-2">Save
                                                        changes</button>
                                                    <button type="reset"
                                                        class="btn btn-label-secondary">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--/ Change Password -->

                                <!-- Two-steps verification -->
                                
                                <!-- Modal -->
                                <!-- Enable OTP Modal -->
                                
                                <!--/ Enable OTP Modal -->
                                <!-- /Modal -->

                                <!--/ Two-steps verification -->

                                <!-- Create an API key -->
                               
                                <!--/ Create an API key -->

                                <!-- API Key List & Access -->
                              
                                <!--/ API Key List & Access -->

                                <!-- Recent Devices -->
                             
                                <!--/ Recent Devices -->

                            </div>
                        </div>

                        <!-- pricingModal -->
                        <!--/ pricingModal -->

                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <!-- Footer-->
                    @include('templates.footer')
                    </footer>
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


<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/account-settings-security by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Aug 2022 10:55:46 GMT -->

</html>
