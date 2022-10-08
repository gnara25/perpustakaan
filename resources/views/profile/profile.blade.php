<!DOCTYPE html>
<html lang="en">

<head>
    @include('template.head')
</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!--sidebar-wrapper-->
        @include('template.sidebar')
        <!--end sidebar-wrapper-->
        <!--header-->
        @include('template.navbar')
        <!--end header-->
        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">User Profile</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class='bx bx-home-alt'></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->
                    <div class="user-profile-page">
                        <div class="card radius-15">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-lg-7 border-right mb-4">
                                        <div class="d-md-flex align-items-center">
                                            <div class="mb-md-0 mb-3">
                                                <img src="fotosiswa/{{ Auth::User()->foto }}"
                                                    class="rounded-circle shadow" width="130" height="130"
                                                    alt="" />
                                            </div>
                                            <div class="ms-md-4 flex-grow-1">
                                                <div class="d-flex align-items-center mb-1">
                                                    <h4 class="mb-0">{{ Auth::user()->username }}</h4>
                                                    <p class="mb-0 ms-auto"></p>
                                                </div>
                                                <p class="mb-0 text-muted">{{ Auth::user()->role }}</p>
                                                {{-- <p class="text-primary"><i class='bx bx-buildings'></i> Epic Coders</p> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-5">
                                        <table class="table table-sm table-borderless mt-md-0 mt-3">
                                            <tbody>
                                                <tr>
                                                    <th>Nama Panjang :</th>
                                                    <td>{{ Auth::user()->name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>No Telepon :</th>
                                                    <td>{{ Auth::user()->notelepon }} </td>
                                                </tr>
                                                <tr>
                                                    <th>Email :</th>
                                                    <td>{{ Auth::user()->email }}</td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                                <!--end row-->
                                <ul class="nav nav-pills">
                                    <li class="nav-item"> <a class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                            href="#Biography"><span class="p-tab-name">Edit Profile</span><i
                                                class='bx bxs-user-rectangle font-24 d-sm-none'></i></a>
                                    </li>
                                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab"
                                            href="#Edit-Profile"><span class="p-tab-name">Ganti Password</span><i
                                                class='bx bx-message-edit font-24 d-sm-none'></i></a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-3">
                                    <div class="tab-pane fade" id="Biography">
                                       
                                        <div class="card shadow-none border mb-0 radius-15">
                                            <div class="card-body">
                                                <div class="form-body">
    
    
                                                    <form class="mb-4" action="{{route('editprofile')}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="mb-4">
                                                            <label class="form-label">Username</label>
                                                            <input type="text" value="{{ Auth::user()->username }}"
                                                                class="form-control" name="username">
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label">Nama</label>
                                                            <input type="text" value="{{ Auth::user()->name }}"
                                                                class="form-control" name="name">
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label">No Telepon</label>
                                                            <input type="text" value="{{ Auth::user()->notelepon }}"
                                                                class="form-control" name="notelepon">
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label">Email</label>
                                                            <input type="text" value="{{ Auth::user()->email }}"
                                                                class="form-control" name="email">
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label">Foto</label>
                                                            <input type="file" 
                                                                class="form-control" name="foto">
                                                        </div>
                                                        <div class="mb-4 text-center">
                                                            <button type="submit" class="btn btn-info btn-round">{{ __('Simpan') }}</button>
                                                        </div>
                                                    </form>
    
    
    
    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Edit-Profile">
                                        <div class="card shadow-none border mb-0 radius-15">
                                            <div class="card-body">
                                                <div class="form-body">
    
    
                                                    <form class="mb-4" action="{{route('editpassword')}}" method="post">
                                                        @csrf
                                                        <div class="mb-4" id="show_hide_password">
                                                                <label class="form-label">Password Lama</label>
                                                                <input type="password" name="old_password" class="form-control" placeholder="Kata Sandi Lama" id="inputChoosePassword">
                                                            </div>
                
                                                        <div class="mb-4" id="show_hide_password">
                                                            <label class="form-label">Password Baru</label>
                                                            <input type="password" name="password" class="form-control" placeholder="Kata Sandi" required>
                                                        </div>
                                                        <div class="mb-4" id="show_hide_password">
                                                            <label class="form-label">Konfirmasi Password</label>
                                                            <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Kata Sandi" required>

                                                        </div>           
                                                                <div class="mb-4 text-center">
                                                                    <button type="submit" class="btn btn-info btn-round">{{ __('Simpan') }}</button>
                                                                </div>                                                        
                                                    </form>
    
    
    
    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
            class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    <!--footer -->
    <div class="footer">
        <p class="mb-0">Syndash @2020 | Developed By : <a href="https://themeforest.net/user/codervent"
                target="_blank">codervent</a>
        </p>
    </div>
    <!-- end footer -->
    </div>
    <!-- end wrapper -->
    <!--start switcher-->
    {{-- <div class="switcher-body">
        <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i
                class="bx bx-cog bx-spin"></i></button>
        <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false"
            tabindex="-1" id="offcanvasScrolling">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <h6 class="mb-0">Theme Variation</h6>
                <hr>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="lightmode"
                        value="option1" checked>
                    <label class="form-check-label" for="lightmode">Light</label>
                </div>
                <hr>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="darkmode"
                        value="option2">
                    <label class="form-check-label" for="darkmode">Dark</label>
                </div>
                <hr>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="darksidebar"
                        value="option3">
                    <label class="form-check-label" for="darksidebar">Semi Dark</label>
                </div>
                <hr>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="ColorLessIcons"
                        value="option3">
                    <label class="form-check-label" for="ColorLessIcons">Color Less Icons</label>
                </div>
            </div>
        </div>
    </div> --}}
    <!--end switcher-->
    <!-- JavaScript -->
    <!-- Bootstrap JS -->
    @include('template.script')

    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
</body>

</html>
