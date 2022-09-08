<!-- Page -->





<!DOCTYPE html>

<html lang="en" class="light-style  layout-menu-fixed   " dir="ltr" data-theme="theme-default"
    data-assets-path="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/"
    data-base-url="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1"
    data-framework="laravel" data-template="vertical-menu-theme-default-light">


<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/profile-user by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Aug 2022 10:55:22 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>User Profile - Profile |
      Sneat -
      Bootstrap 5 HTML Admin Template - Pro</title>
    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="0MjIUPhqNgzfdBvHYUi8hPIKT4bCRfWbRTmBQEkI">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/item/sneat-bootstrap-html-laravel-admin-template/">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/favicon/favicon.ico" />

    <!-- Include Styles -->
    <!-- BEGIN: Theme CSS-->
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('templtes/demo/assets/vendor/fonts/boxiconse04f.css?id=7bed0c381d8a5b57f43c7bd313947977')}}" />
  <link rel="stylesheet" href="{{ asset('templates/demo/assets/vendor/fonts/fontawesomeb34a.css?id=f55d5b6721febc124275199b7dddbb5b')}}" />
  <link rel="stylesheet" href="{{ asset('templates/demo/assets/vendor/fonts/flag-iconsc977.css?id=7018802e2db10780041f73a184e4bebe')}}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('templates/demo/assets/vendor/css/rtl/core29d0.css?id=7ea028d8943e4d11544610602e504b70')}}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{ asset('templates/demo/assets/vendor/css/rtl/theme-defaultde12.css?id=3cdafbb15e4b7f9cbb567018a632af10')}}" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{ asset('templates/demo/assets/css/demo6e6a.css?id=8a804dae81f41c0f9fcbef2fa8316bdd')}}" />


  <link rel="stylesheet" href="{{ asset('templates/demo/assets/vendor/libs/perfect-scrollbar/perfect-scrollbarb440.css?id=d9fa6469688548dca3b7e6bd32cb0dc6')}}" />
  <link rel="stylesheet" href="{{ asset('templates/demo/assets/vendor/libs/typeahead-js/typeahead3881.css?id=8fc311b79b2aeabf94b343b6337656cf')}}" />

  <!-- Vendor Styles -->
  <link rel="stylesheet" href="{{ asset('templates/demo/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
  <link rel="stylesheet" href="{{ asset('templates/demo/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
  <link rel="stylesheet" href="{{ asset('templates/demo/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}">


  <!-- Page Styles -->
  <link rel="stylesheet" href="{{ asset('templates/demo/assets/vendor/css/pages/page-profile.css')}}" />

    <!-- Include Scripts for customizer, helper, analytics, config -->
    <!-- laravel style -->
  <script src="{{ asset('templates/demo/assets/vendor/js/helpers.js')}}"></script>
  <!-- beautify ignore:start -->
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('templates/demo/assets/vendor/js/template-customizer.js')}}"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('templates/demo/assets/js/config.js')}}"></script>

    <script>
      window.templateCustomizer = new TemplateCustomizer({
        cssPath: '',
        themesPath: '',
        defaultShowDropdownOnHover: true, // true/false (for horizontal layout only)
        displayCustomizer: true,
        lang: 'en',
        pathResolver: function(path) {
          var resolvedPaths = {
            // Core stylesheets
                        'core.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/core.css?id=7ea028d8943e4d11544610602e504b70',
              'core-dark.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/core-dark.css?id=4d3d0e2ab14ecbed2083861be9812a6f',

            // Themes
                        'theme-default.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-default.css?id=3cdafbb15e4b7f9cbb567018a632af10',
              'theme-default-dark.css':
              'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-default-dark.css?id=05dbf7c059f1493714333faa2b3b9551',
                        'theme-bordered.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-bordered.css?id=d6c71dfec8b2243aaa4ff471ffcb4e24',
              'theme-bordered-dark.css':
              'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-bordered-dark.css?id=f6ff29f111b4fa9e7eaf2b1123ef9dfe',
                        'theme-semi-dark.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-semi-dark.css?id=ab4aad06ff175954e3058d7dc07cca0d',
              'theme-semi-dark-dark.css':
              'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-semi-dark-dark.css?id=366f5c60c757a1a9970a4c91c66b0cb2',
                    }
          return resolvedPaths[path] || path;
        },
        'controls': ["rtl","style","layoutType","showDropdownOnHover","layoutNavbarFixed","layoutFooterFixed","themes"],
      });
    </script>
    <!-- beautify ignore:end -->

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'GA_MEASUREMENT_ID');

  </script>
  </head>

  @include('templates.head')

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
                            <span class="text-muted fw-light">User Profile /</span> Profile
                        </h4>

                        <!-- Header -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="user-profile-header-banner">
                                        <img src="{{ asset('templates/demo/assets/img/pages/profile-banner.png')}}" alt="Banner image"
                                            class="rounded-top">
                                    </div>
                                    <div
                                        class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                                            <img src="{{ asset('templates/demo/assets/img/avatars/1.png')}}" alt="user image"
                                                class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                                        </div>
                                        <div class="flex-grow-1 mt-3 mt-sm-5">
                                            <div
                                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                                <div class="user-profile-info">
                                                    <h4>John Doe</h4>
                                                    <ul
                                                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                                        <li class="list-inline-item fw-semibold">
                                                            <i class='bx bx-pen'></i> UX Designer
                                                        </li>
                                                        <li class="list-inline-item fw-semibold">
                                                            <i class='bx bx-map'></i> Vatican City
                                                        </li>
                                                        <li class="list-inline-item fw-semibold">
                                                            <i class='bx bx-calendar-alt'></i> Joined April 2021
                                                        </li>
                                                    </ul>
                                                </div>
                                                <a href="javascript:void(0)" class="btn btn-primary text-nowrap">
                                                    <i class='bx bx-user-check'></i> Connected
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Header -->

                        <!-- Navbar pills -->
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i
                                                class='bx bx-user'></i> Profile</a></li>
                                    <li class="nav-item"><a class="nav-link" href="profile-teams.html"><i
                                                class='bx bx-group'></i> Teams</a></li>
                                    <li class="nav-item"><a class="nav-link" href="profile-projects.html"><i
                                                class='bx bx-grid-alt'></i> Projects</a></li>
                                    <li class="nav-item"><a class="nav-link" href="profile-connections.html"><i
                                                class='bx bx-link-alt'></i> Connections</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--/ Navbar pills -->

                        <!-- User Profile Content -->
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 col-md-5">
                                <!-- About User -->
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <small class="text-muted text-uppercase">About</small>
                                        <ul class="list-unstyled mb-4 mt-3">
                                            <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span
                                                    class="fw-semibold mx-2">Full Name:</span> <span>John Doe</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span
                                                    class="fw-semibold mx-2">Status:</span> <span>Active</span></li>
                                            <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span
                                                    class="fw-semibold mx-2">Role:</span> <span>Developer</span></li>
                                            <li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><span
                                                    class="fw-semibold mx-2">Country:</span> <span>USA</span></li>
                                            <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span
                                                    class="fw-semibold mx-2">Languages:</span> <span>English</span></li>
                                        </ul>
                                        <small class="text-muted text-uppercase">Contacts</small>
                                        <ul class="list-unstyled mb-4 mt-3">
                                            <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span
                                                    class="fw-semibold mx-2">Contact:</span> <span>(123) 456-7890</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-3"><i class="bx bx-chat"></i><span
                                                    class="fw-semibold mx-2">Skype:</span> <span>john.doe</span></li>
                                            <li class="d-flex align-items-center mb-3"><i
                                                    class="bx bx-envelope"></i><span
                                                    class="fw-semibold mx-2">Email:</span>
                                                <span>john.doe@example.com</span></li>
                                        </ul>
                                        <small class="text-muted text-uppercase">Teams</small>
                                        <ul class="list-unstyled mt-3 mb-0">
                                            <li class="d-flex align-items-center mb-3"><i
                                                    class="bx bxl-github text-primary me-2"></i>
                                                <div class="d-flex flex-wrap"><span class="fw-semibold me-2">Backend
                                                        Developer</span><span>(126 Members)</span></div>
                                            </li>
                                            <li class="d-flex align-items-center"><i
                                                    class="bx bxl-react text-info me-2"></i>
                                                <div class="d-flex flex-wrap"><span class="fw-semibold me-2">React
                                                        Developer</span><span>(98 Members)</span></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--/ About User -->
                                <!-- Profile Overview -->
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <small class="text-muted text-uppercase">Overview</small>
                                        <ul class="list-unstyled mt-3 mb-0">
                                            <li class="d-flex align-items-center mb-3"><i
                                                    class="bx bx-check"></i><span class="fw-semibold mx-2">Task
                                                    Compiled:</span> <span>13.5k</span></li>
                                            <li class="d-flex align-items-center mb-3"><i
                                                    class='bx bx-customize'></i><span
                                                    class="fw-semibold mx-2">Projects Compiled:</span> <span>146</span>
                                            </li>
                                            <li class="d-flex align-items-center"><i class="bx bx-user"></i><span
                                                    class="fw-semibold mx-2">Connections:</span> <span>897</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--/ Profile Overview -->
                            </div>
                            <div class="col-xl-8 col-lg-7 col-md-7">
                                <!-- Activity Timeline -->
                                <div class="card card-action mb-4">
                                    <div class="card-header align-items-center">
                                        <h5 class="card-action-title mb-0"><i class='bx bx-list-ul me-2'></i>Activity
                                            Timeline</h5>
                                        <div class="card-action-element">
                                            <div class="dropdown">
                                                <button type="button" class="btn dropdown-toggle hide-arrow p-0"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="javascript:void(0);">Share
                                                            timeline</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);">Suggest
                                                            edits</a></li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);">Report
                                                            bug</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ul class="timeline ms-2">
                                            <li class="timeline-item timeline-item-transparent">
                                                <span class="timeline-point timeline-point-warning"></span>
                                                <div class="timeline-event">
                                                    <div class="timeline-header mb-1">
                                                        <h6 class="mb-0">Client Meeting</h6>
                                                        <small class="text-muted">Today</small>
                                                    </div>
                                                    <p class="mb-2">Project meeting with john @10:15am</p>
                                                    <div class="d-flex flex-wrap">
                                                        <div class="avatar me-3">
                                                            <img src="{{ asset('templates/demo/assets/img/avatars/3.png')}}"
                                                                alt="Avatar" class="rounded-circle" />
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0">Lester McCarthy (Client)</h6>
                                                            <span>CEO of Infibeam</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item timeline-item-transparent">
                                                <span class="timeline-point timeline-point-info"></span>
                                                <div class="timeline-event">
                                                    <div class="timeline-header mb-1">
                                                        <h6 class="mb-0">Create a new project for client</h6>
                                                        <small class="text-muted">2 Day Ago</small>
                                                    </div>
                                                    <p class="mb-0">Add files to new design folder</p>
                                                </div>
                                            </li>
                                            <li class="timeline-item timeline-item-transparent">
                                                <span class="timeline-point timeline-point-primary"></span>
                                                <div class="timeline-event">
                                                    <div class="timeline-header mb-1">
                                                        <h6 class="mb-0">Shared 2 New Project Files</h6>
                                                        <small class="text-muted">6 Day Ago</small>
                                                    </div>
                                                    <p class="mb-2">Sent by Mollie Dixon <img
                                                            src="{{ asset('templates/demo/assets/img/avatars/4.png')}}"
                                                            class="rounded-circle ms-3" alt="avatar" height="20"
                                                            width="20"></p>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <a href="javascript:void(0)" class="me-3">
                                                            <img src="{{ asset('templates/demo/assets/img/icons/misc/pdf.png')}}"
                                                                alt="Document image" width="20" class="me-2">
                                                            <span class="h6">App Guidelines</span>
                                                        </a>
                                                        <a href="javascript:void(0)">
                                                            <img src="{{ asset('templates/demo/assets/img/icons/misc/xls.png')}}"
                                                                alt="Excel image" width="20" class="me-2">
                                                            <span class="h6">Testing Results</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item timeline-item-transparent">
                                                <span class="timeline-point timeline-point-success"></span>
                                                <div class="timeline-event pb-0">
                                                    <div class="timeline-header mb-1">
                                                        <h6 class="mb-0">Project status updated</h6>
                                                        <small class="text-muted">10 Day Ago</small>
                                                    </div>
                                                    <p class="mb-0">Woocommerce iOS App Completed</p>
                                                </div>
                                            </li>
                                            <li class="timeline-end-indicator">
                                                <i class="bx bx-check-circle"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--/ Activity Timeline -->
                                <div class="row">
                                    <!-- Connections -->
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="card card-action mb-4">
                                            <div class="card-header align-items-center">
                                                <h5 class="card-action-title mb-0">Connections</h5>
                                                <div class="card-action-element">
                                                    <div class="dropdown">
                                                        <button type="button"
                                                            class="btn dropdown-toggle hide-arrow p-0"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="bx bx-dots-vertical-rounded"></i></button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item"
                                                                    href="javascript:void(0);">Share connections</a>
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    href="javascript:void(0);">Suggest edits</a></li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    href="javascript:void(0);">Report bug</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="d-flex align-items-start">
                                                                <div class="avatar me-3">
                                                                    <img src="{{ asset('templates/demo/assets/img/avatars/2.png')}}"
                                                                        alt="Avatar" class="rounded-circle" />
                                                                </div>
                                                                <div class="me-2">
                                                                    <h6 class="mb-0">Cecilia Payne</h6>
                                                                    <small class="text-muted">45 Connections</small>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <button
                                                                    class="btn btn-label-primary btn-icon btn-sm"><i
                                                                        class="bx bx-user"></i></button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="d-flex align-items-start">
                                                                <div class="avatar me-3">
                                                                    <img src="{{ asset('templates/demo/assets/img/avatars/3.png')}}"
                                                                        alt="Avatar" class="rounded-circle" />
                                                                </div>
                                                                <div class="me-2">
                                                                    <h6 class="mb-0">Curtis Fletcher</h6>
                                                                    <small class="text-muted">1.32k Connections</small>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <button class="btn btn-primary btn-icon btn-sm"><i
                                                                        class="bx bx-user"></i></button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="d-flex align-items-start">
                                                                <div class="avatar me-3">
                                                                    <img src="{{ asset('templates/demo/assets/img/avatars/10.png')}}"
                                                                        alt="Avatar" class="rounded-circle" />
                                                                </div>
                                                                <div class="me-2">
                                                                    <h6 class="mb-0">Alice Stone</h6>
                                                                    <small class="text-muted">125 Connections</small>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <button class="btn btn-primary btn-icon btn-sm"><i
                                                                        class="bx bx-user"></i></button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="d-flex align-items-start">
                                                                <div class="avatar me-3">
                                                                    <img src="{{ asset('templates/demo/assets/img/avatars/7.png')}}"
                                                                        alt="Avatar" class="rounded-circle" />
                                                                </div>
                                                                <div class="me-2">
                                                                    <h6 class="mb-0">Darrell Barnes</h6>
                                                                    <small class="text-muted">456 Connections</small>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <button
                                                                    class="btn btn-label-primary btn-icon btn-sm"><i
                                                                        class="bx bx-user"></i></button>
                                                            </div>
                                                        </div>
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="d-flex align-items-start">
                                                                <div class="avatar me-3">
                                                                    <img src="{{ asset('templates/demo/assets/img/avatars/12.png')}}"
                                                                        alt="Avatar" class="rounded-circle" />
                                                                </div>
                                                                <div class="me-2">
                                                                    <h6 class="mb-0">Eugenia Moore</h6>
                                                                    <small class="text-muted">1.2k Connections</small>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <button
                                                                    class="btn btn-label-primary btn-icon btn-sm"><i
                                                                        class="bx bx-user"></i></button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="text-center">
                                                        <a href="javascript:;">View all connections</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Connections -->
                                    <!-- Teams -->
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="card card-action mb-4">
                                            <div class="card-header align-items-center">
                                                <h5 class="card-action-title mb-0">Teams</h5>
                                                <div class="card-action-element">
                                                    <div class="dropdown">
                                                        <button type="button"
                                                            class="btn dropdown-toggle hide-arrow p-0"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="bx bx-dots-vertical-rounded"></i></button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item"
                                                                    href="javascript:void(0);">Share teams</a></li>
                                                            <li><a class="dropdown-item"
                                                                    href="javascript:void(0);">Suggest edits</a></li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    href="javascript:void(0);">Report bug</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex align-items-start">
                                                                <div class="avatar me-3">
                                                                    <img src="{{ asset('templates/demo/assets/img/icons/brands/react-label.png')}}"
                                                                        alt="Avatar" class="rounded-circle" />
                                                                </div>
                                                                <div class="me-2">
                                                                    <h6 class="mb-0">React Developers</h6>
                                                                    <small class="text-muted">72 Members</small>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:;"><span
                                                                        class="badge bg-label-danger">Developer</span></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex align-items-start">
                                                                <div class="avatar me-3">
                                                                    <img src="{{ asset('templates/demo/assets/img/icons/brands/support-label.png')}}"
                                                                        alt="Avatar" class="rounded-circle" />
                                                                </div>
                                                                <div class="me-2">
                                                                    <h6 class="mb-0">Support Team</h6>
                                                                    <small class="text-muted">122 Members</small>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:;"><span
                                                                        class="badge bg-label-primary">Support</span></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex align-items-start">
                                                                <div class="avatar me-3">
                                                                    <img src="{{ asset('templates/demo/assets/img/icons/brands/figma-label.png')}}"
                                                                        alt="Avatar" class="rounded-circle" />
                                                                </div>
                                                                <div class="me-2">
                                                                    <h6 class="mb-0">UI Designers</h6>
                                                                    <small class="text-muted">7 Members</small>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:;"><span
                                                                        class="badge bg-label-info">Designer</span></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex align-items-start">
                                                                <div class="avatar me-3">
                                                                    <img src="{{ asset('templates/demo/assets/img/icons/brands/vue-label.png')}}"
                                                                        alt="Avatar" class="rounded-circle" />
                                                                </div>
                                                                <div class="me-2">
                                                                    <h6 class="mb-0">Vue.js Developers</h6>
                                                                    <small class="text-muted">289 Members</small>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:;"><span
                                                                        class="badge bg-label-danger">Developer</span></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex align-items-start">
                                                                <div class="avatar me-3">
                                                                    <img src="{{ asset('templates/demo/assets/img/icons/brands/twitter-label.png')}}"
                                                                        alt="Avatar" class="rounded-circle" />
                                                                </div>
                                                                <div class="me-w">
                                                                    <h6 class="mb-0">Digital Marketing</h6>
                                                                    <small class="text-muted">24 Members</small>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:;"><span
                                                                        class="badge bg-label-secondary">Marketing</span></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="text-center">
                                                        <a href="javascript:;">View all teams</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Teams -->
                                </div>
                                <!-- Projects table -->
                                <div class="card mb-4">
                                    <div class="card-datatable table-responsive">
                                        <table class="datatables-projects border-top table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Name</th>
                                                    <th>Leader</th>
                                                    <th>Team</th>
                                                    <th class="w-px-200">Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <!--/ Projects table -->
                            </div>
                        </div>
                        <!--/ User Profile Content -->

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


    <div class="buy-now">
        <a href="https://themeselection.com/item/sneat-bootstrap-html-laravel-admin-template/" target="_blank"
            class="btn btn-danger btn-buy-now">Buy Now</a>
    </div>


    <!-- Include Scripts -->
    @include('templates.script')
    <!-- END: Page JS-->

</body>


<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/profile-user by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Aug 2022 10:55:29 GMT -->

</html>
