

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset ('login/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{ asset ('login/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset ('login/css/bootstrap.min.css')}}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset ('login/css/style.css')}}">

    <title>Login || Perpustakaan</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="{{ asset ('login/images/bg20.png')}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Masuk Ke <strong>Perpustakaan</strong></h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
            </div>
            <form action="#" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username">
              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password">
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <!-- <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label> -->
                <!-- <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>  -->
              </div>
              
                <input type="submit" value="Masuk" class="btn text-white btn-block btn-primary">

            </form>
            <a class="d-block text-left my-4 text-center" href="register.html"> Register</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
    <script src="{{ asset ('login/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset ('login/js/popper.min.js') }}"></script>
    <script src="{{ asset ('login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('login/js/main.js') }}"></script>
  </body>
</html>