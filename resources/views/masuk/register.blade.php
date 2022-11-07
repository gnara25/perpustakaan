<!DOCTYPE html>
<!-- <html lang="en" style="background-image: url(http://demo.desnet.id/smkn1smg/perpus//assets/images/bg-login.jpg);background-size: cover;"> -->
<html lang="en">
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDkyiOeYrYiEWZoGEPCKSzcS7klheX6xY&sensor=false"
    type="text/javascript"></script>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="32x32" href="asset/img/logosmk.png">
    <title>Perpustakaan SMKN 1 Sukorejo - Daftar</title>
    <!-- Bootstrap Core CSS -->
    <link href="../masuk/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../masuk/css/style.css" rel="stylesheet">
    <link href="../masuk/css/custom-vii.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="../masuk/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        .login-box {
            width: 50%;
        }

        .login-box {
            padding: 3em 3.5em 1.5em;
        }

        h3 {
            color: #000;
            font-family: 'Open Sans Bold';
            margin-bottom: .8em;
            font-size: 1.4em;
        }

        @media (max-width:768px) {
            .login-box {
                width: 90%;
            }

            .login-box {
                padding: 1.5em 2em 2em;
            }
        }
    </style>
</head>

<body style="background-color:#f5f7fa;">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2"
                stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="bag-logo">
            <img class="logo" src="../masuk/assets/images/logo_login.png">
        </div>
        <div class="login-box-bas bag-daftar">
            <div class="login-box card">
                <form accept-charset="UTF-8" role="form" id='xyz' class="form-signin" action="registeruser"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <h3>Data Diri</h3>
                    <div class="form-group row">
                        <div class="col-md-12 col-12">
                            <label>Nama Lengkap</label>
                            <input class="form-control" type="text" required="" placeholder="Nama Lengkap"
                                name="name">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Username</label>
                            <input class="form-control" type="text" required="" placeholder="Username"
                                name="username">
                            @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>No. Telepon</label>
                            <input class="form-control" type="number" required="" placeholder="No HP"
                                name="notelepon">
                            @error('notelepon')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <h3 style="margin-top: 1.5em;">Akses Akun</h3>
                    <div class="form-group row">
                        <div class="col-md-12 col-12">
                            <label>Email</label>
                            <input class="form-control" type="text" required="" placeholder="Min 3 Karakter"
                                name="email">
                        </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 col-12 mb-4">
                            <label>Password</label>
                            <input class="form-control" type="password" required=""
                                placeholder="Password Minimal 8 karakter" name="password">
                        </div>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!--  <div class="form-group row">
                      <div class="col-md-12 col-12">
                          <label>Konfirmasi Password</label>
                          <input class="form-control" type="password" required="" placeholder="Konfirmasi Password"  name="password2">
                      </div>
                  </div>   -->
                    <div class="form-group row mb-0">
                        <div class="col-md-6 font-14">
                            <button class="btn btn-info waves-effect waves-light btn-block" type="submit"
                                id='register'>
                                Daftar
                            </button>
                        </div>
                        <div class="col-md-6 font-14">
                            <a href="login" class="btn btn-outline-info waves-effect waves-light btn-block"
                                type="button">
                                Kembali
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../masuk/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../masuk/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../masuk/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../masuk/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../masuk/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../masuk/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../masuk/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../masuk/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="../masuk/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../masuk/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

<script type="text/javascript">
    //  $(document).ready(function() {
    //  //first form
    //  var inp1 = $("#inp1"),
    //  show = $(".fa-eye"),
    //  hide = $(".fa-eye-slash");
    //  show.show();
    //  hide.hide();
    //  show.click(function () {
    //   inp1.attr("type","text");
    //   show.hide();
    //   hide.show(); 
    // });
    //  hide.click(function () {
    //   inp1.attr("type","password");
    //   show.show();
    //   hide.hide();
    // });

    //end first form
    //second form
    // var pass = $("#inp2"),
    // check = $("#inp3"),
    // lab = $("#label");
    // check.checked = false;
    // check.click(function() {
    //   if (check.checked === false) {
    //     check.checked = true;  
    //     pass.attr("type","text");
    //     lab.text("Hide Password");  
    //   } else {
    //     check.checked = false;  
    //     pass.attr("type","password");
    //     lab.text("Show Password");
    //   }
    // });
    // end second form
    // third form
    // var inp4 = $("#inp4"),
    // btn = $("#btn");
    // btn.click(function (e) {
    //   btn.toggleClass("show-hide");
    //   if(btn.hasClass("show-hide") === true){
    //     inp4.attr("type","text");
    //     btn.text("Hide Password");

    //   } else {
    //     inp4.attr("type","password");
    //     btn.text("Show Password");
    //   }
    //   e.preventDefault();
    // });
    //end third form
</script>

</html>
