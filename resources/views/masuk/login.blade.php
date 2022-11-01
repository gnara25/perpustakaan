
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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon-32x32.png">
    <title>Perpustakan</title>
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
  .kotaklgn {
    padding-left: 40% !important;
  }
  .dua {
    position: absolute;
    width: 50%;
    height: 100%;
    top: 0;
    left: 0;
    padding: 170px 30px 30px 30px;
    background-image: url(../masuk/assets/aa/1.png);
    background-repeat: no-repeat;
    background-position: center center;
  }
  .dua h3,
  .dua p {
    text-align: center;
    color: blue;
  }
  .dua h3 {
    font-weight: bold;
    margin-bottom: 20px;
  }

  .xxx {
    position: absolute;
    top: 30px;
    left: 0;
    width: 180px;
    padding: 15px 25px;
    border-top-right-radius: 35px;
    border-bottom-right-radius: 35px;
    border: 1px solid rgba(0,0,0,0.06) !important;
    border-left-width: 0 !important;
  }
  @media (max-width: 768px) {
    .dua {
      display: none !important;
    }
    .kotaklgn {
      padding-left: 0 !important;
      padding-right: 0 !important;
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
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="bag-logo" style="padding-top: 80px;">
<!--             <img src="http://demo.desnet.id/smkn1smg/perpus//assets/images/logo_login.png" width="200"/><br><br> -->
        </div>
        <div class="login-box-bas bag-daftar">
          <div class="login-box card kotaklgn">
            <div class="dua">
              <div class="xxx">
                <img src="../masuk/assets/aa/2.png" width="100%"/>
              </div>
            </div>
            <center><img src="../masuk/assets/aa/2.png" width="65%" style="margin-top: 20px;"/></center>
            <h3 class="text-center mb-0">
              Masuk
            </h3>
            <form class="row g-3" action="/logined" class="user" method="POST">
              @csrf
              <div class="card-body pb-0">
                <div class="form-group row">
                    <div class="col-md-12 col-12">
                        <label>Email</label>
                        <input  class="form-control" type="email" placeholder="Email" name="email" required="">
                    </div>
                </div>                
                <div class="form-group row">
                    <div class="col-md-12 col-12">
                        <label>Password</label>
                        <input id="inp1" class="form-control" type="password"placeholder="Password" name="password" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 col-12">
                        <div class="checkbox checkbox-primary pull-left p-t-0">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup" style="margin:0;"> 
                                <small>Show Password</small>
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-info btn-block btn-sm my-3 py-2" style="border-radius: 7px;">Masuk</button>
                <div class="text-center" style="font-family: 'Open Sans SemiBold';">
                  Tidak Memiliki Akun? <a href="register">Daftar Sekarang</a>
                </div>
              <!--   <a href="#" data-toggle="modal" data-target="#uuss" style="width: 100%; margin-top: 15px; display: block; text-align: center;">User Demo</a>
 -->             </div>
            </form>
          </div>        
        </div>
        <!-- <div class="text-center mt-3">
            <p class="f-12" style="font-family: 'Open Sans Bold'; color: #000;">
              Supported by
            </p>
        </div> -->
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
    $(document).ready(function() {
    //first form
    var inp1 = $("#inp1"),
    show = $(".fa-eye"),
    hide = $(".fa-eye-slash");
    show.show();
    hide.hide();
    show.click(function () {
     inp1.attr("type","text");
     show.hide();
     hide.show(); 
   });
    hide.click(function () {
     inp1.attr("type","password");
     show.show();
     hide.hide();
   });

    //end first form
    //second form
    var pass = $("#inp2"),
    check = $("#inp3"),
    lab = $("#label");
    check.checked = false;
    check.click(function() {
      if (check.checked === false) {
        check.checked = true;  
        pass.attr("type","text");
        lab.text("Hide Password");  
      } else {
        check.checked = false;  
        pass.attr("type","password");
        lab.text("Show Password");
      }
    });
    // end second form
    // third form
    var inp4 = $("#inp4"),
    btn = $("#btn");
    btn.click(function (e) {
      btn.toggleClass("show-hide");
      if(btn.hasClass("show-hide") === true){
        inp4.attr("type","text");
        btn.text("Hide Password");
        
      } else {
        inp4.attr("type","password");
        btn.text("Show Password");
      }
      e.preventDefault();
    });
    //end third form

  });
  </script>

</html>
