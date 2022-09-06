<!DOCTYPE html>

<html lang="en" class="no-js">

    <head>
        <meta charset="utf-8" />
        <title>Perpustakaan || Kita</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="FlameOnePage freebie theme for web startups by FairTech SEO." name="description" />
        <meta content="FairTech" name="author" />
        <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link href="{{ asset('landingpage/vendor/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('landingpage/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('landingpage/css/animate.css')}}" rel="stylesheet">
        <link href="{{ asset('landingpage/vendor/swiper/css/swiper.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('landingpage/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="favicon.ico" />
    </head>
    


<body id="body" data-spy="scroll" data-target=".header">

    <header class="header navbar-fixed-top">
        <nav class="navbar" role="navigation">
            <div class="container">
                <div class="menu-container js_nav-item">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="toggle-icon"></span>
                    </button>

                    <!-- <div class="logo">
                        <a class="logo-wrap" href="#body">
                            <img class="logo-img logo-img-main" src="landingpage/img/logo1.jpg" alt="FlameOnePage Logo">
                            <img class="logo-img logo-img-active" src="landingpage/img/logo-dark.png"
                                alt="FlameOnePage Dark Logo">
                        </a>
                    </div> -->
                </div>

                <div class="collapse navbar-collapse nav-collapse">

                    <!--div class="language-switcher">
					  <ul class="nav-lang">
                        <li><a class="active" href="#">EN</a></li>
					    <li><a href="#">DE</a></li>
						<li><a href="#">FR</a></li>
					  </ul>
					</div--->

                    <div class="menu-container ">
                        <ul class="nav navbar-nav navbar-nav-right">
                            <li class="js_nav-item nav-item active"><a class="nav-item-child nav-item-hover"
                                    href="/landing">Beranda</a></li>
                            <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover"
                                    href="/daftar_buku">Daftar Buku</a></li>
                            <!-- <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover"
                                    href="#">Rekomendasi</a></li> -->
                            <!-- <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover"
                                    href="#rule">Peraturan</a></li>  -->
                            <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover"
                                    href="/loginn">Masuk</a></li>
                            {{-- <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover"
                                    href="login.html">Masuk</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <div class="container">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            </ol>
        </div>

        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img class="img-responsive" src="{{asset('landingpage/img/1920x1080/kon.jpg')}}" alt="Slider Image">
                <div class="container">
                    <div class="carousel-centered">
                        <div class="margin-b-40">
                            <h1 class="carousel-title">Selamat Datang <br /> DI Perpustakaan</h1>
                            <p class="color-white">"Perpustakaan menyimpan energi yang memicu imajinasi.
                                <br />Perpustakaan membuka jendela ke dunia dan menginspirasi kita untuk mengeksplorasi
                                dan mencapai,
                                <br /> dan berkontribusi untuk meningkatkan kualitas hidup kita."
                            </p>
                        </div>
                        <a href="login.html" class="btn-theme btn-theme-sm btn-white-brd text-uppercase">Masuk</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="img-responsive" src="{{asset('landingpage/img/1920x1080/31705.jpg')}}" alt="Slider Image">
                <div class="container">
                    <div class="carousel-centered">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--========== SLIDER ==========-->

    <!--========== PAGE LAYOUT ==========-->
    <!-- Latest Products -->
    <div id="buku">
        <div class="content-lg container ">
            <div class="row margin-b-40">
                <div class="col-sm-6">
                    <h2>Daftar Buku</h2>
                </div>
            </div>
            <!--// end row -->

            <div class="row">
                <!-- Latest Products -->
                <div class="col-sm-4 sm-margin-b-50">
                    <div class="margin-b-20">
                        <h4 class="text-center"><a href="#">Senja Pagi</a> </h4>
                        <img class="img-responsive"
                            style="width: 250px; height: 230px; margin-right: auto; margin-left: auto;"
                            src="{{asset('landingpage/img/970x647/04.jpg')}}" alt="Latest Products Image">
                    </div>
                    <p>Katamu, setiap perasaan yang tumbuh adalah sebuah alasan. Alasan bahwa hati patut dipertahankan.
                        Namun, cinta saja belum cukup menyatukan mimpi yang berbeda di antara kita. Dan, menepati janji
                        ternyata tak semudah mengucapkannya.</p>
                        <div>
                            <a class="" href="#" style="float: left; margin-left: 20px;">Detail Buku </a>
                            <a class="" href="#" style="float: right; margin-right: 60px;">Pinjam Buku </a>
                    </div>

                </div>
                <!-- End Latest Products -->

                <!-- Latest Products -->
                <div class="col-sm-4 sm-margin-b-50">
                    <h4 class="text-center"><a href="#">Rentang Waktu</a></h4>
                    <div class="margin-b-20">
                        <img class="img-responsive"
                            style="width: 250px; height: 230px; margin-right: auto; margin-left: auto;"
                            src="{{asset('landingpage/img/970x647/df2.jpg')}}" alt="Latest Products Image">
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor
                        magna ut consequat siad esqudiat dolor</p>
                        <a class="" href="#" style="float: left; margin-left: 20px;">Detail Buku </a>
                        <a class="" href="#" style="float: right; margin-right: 60px;">Pinjam Buku </a>
                </div>
                <!-- End Latest Products -->

                <!-- Latest Products -->
                <div class="col-sm-4 sm-margin-b-50">
                    <h4 class="text-center"><a href="#">Senja di Mata Bintang</a></h4>
                    <div class="margin-b-20">
                        <img class="img-responsive"
                            style="width: 250px; height: 240px; margin-right: auto; margin-left: auto;"
                            src="{{asset('landingpage/img/970x647/df4.jpg')}}" alt="Latest Products Image">
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor
                        magna ut consequat siad esqudiat dolor</p>
                        <a class="" href="#" style="float: left; margin-left: 20px;">Detail Buku </a>
                        <a class="" href="#" style="float: right; margin-right: 60px;">Pinjam Buku </a>
                </div>
                <!-- End Latest Products -->
            </div>

            <div class="content-lg container ">

                <!-- Latest Products -->
                <div class="col-sm-4 sm-margin-b-50 mt-4">
                    <div class="margin-b-20">
                        <h4 class="text-center mb-4"><a href="#">Laskar Pelangi</a> </h4>
                        <img class="img-responsive"
                            style="width: 280px; height: 200px; margin-right: auto; margin-left: auto;"
                            src="{{asset('landingpage/img/970x647/df5.jpg')}}" alt="Latest Products Image">
                    </div>
                    <p>Katamu, setiap perasaan yang tumbuh adalah sebuah alasan. Alasan bahwa hati patut dipertahankan.
                        Namun, cinta saja belum cukup menyatukan mimpi yang berbeda di antara kita. Dan, menepati janji
                        ternyata tak semudah mengucapkannya.</p>
                    <a class="" href="#" style="float: left; margin-left: 20px;">Detail Buku </a>
                    <a class="" href="#" style="float: right; margin-right: 60px;">Pinjam Buku </a>
                </div>
                <!-- End Latest Products -->
                <!-- Latest Products -->
                <div class="col-sm-4 sm-margin-b-50">
                    <div class="margin-b-20">
                        <h4 class="text-center"><a href="#">Bukan Buku Nikah </a> </h4>
                        <img style="width: 150px; height: 200px; margin-right: auto; margin-left: auto;"
                            class="img-responsive" src="{{asset('landingpage/img/970x647/df7.jpg')}}" alt="Latest Products Image">
                    </div>
                    <p>Katamu, setiap perasaan yang tumbuh adalah sebuah alasan. Alasan bahwa hati patut dipertahankan.
                        Namun, cinta saja belum cukup menyatukan mimpi yang berbeda di antara kita. Dan, menepati janji
                        ternyata tak semudah mengucapkannya.</p>
                        <a class="" href="#" style="float: left; margin-left: 20px;">Detail Buku </a>
                        <a class="" href="#" style="float: right; margin-right: 60px;">Pinjam Buku </a>
                </div>
                <!-- End Latest Products -->
                <!-- Latest Products -->
                <div class="col-sm-4 sm-margin-b-50">
                    <div class="margin-b-20">
                        <h4 class="text-center"><a href="#">Angkasa</a> </h4>
                        <img class="img-responsive"
                            style="width: 150px; height: 200px; margin-right: auto; margin-left: auto;"
                            src="{{asset('landingpage/img/970x647/df3.jpg')}}" alt="Latest Products Image">
                    </div>
                    <p>Katamu, setiap perasaan yang tumbuh adalah sebuah alasan. Alasan bahwa hati patut dipertahankan.
                        Namun, cinta saja belum cukup menyatukan mimpi yang berbeda di antara kita. Dan, menepati janji
                        ternyata tak semudah mengucapkannya.</p>
                        <a class="" href="#" style="float: left; margin-left: 20px;">Detail Buku </a>
                        <a class="" href="#" style="float: right; margin-right: 60px;">Pinjam Buku </a>
                </div>
                <div class="">
                    <center><a href="daftarbuku.html" class="content-lg container mb-4 ">lihat Selengkapnya ->></a>
                    </center>
                </div>
                <!-- End Latest Products -->
            </div>
            <!--// end row -->
        </div>
    </div>
    <!-- End Latest Products -->

    <!-- About -->
    <!-- <div id="rule">
        <div class=" container"> -->
    <!-- Masonry Grid -->
    <!-- <div class="masonry-grid row">
                <div class="masonry-grid-sizer col-xs-6 col-sm-6 col-md-1"></div>
                <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4 sm-margin-b-30">
                  <center><h2>Peraturan Perpustakaan</h2></center>
                    <img class="full-width img-responsive wow fadeInUp" style="justify-items: center;" src="img/1920x1080/rule.jpg" alt="Portfolio Image"
                        data-wow-duration=".3" data-wow-delay=".2s">
                    <div class="margin-left ">
                        <p>1. njhugtdrseewaesrtuhj</p>
                        <p>2. bhygtftctcytvuy</p>
                    </div>
                </div>
            </div>  -->
    <!-- End Masonry Grid -->
    </div>

    </div>


    <!-- End About -->

    <!-- Pricing -->
    <!-- <div id="pricing">
        <div class="bg-color-sky-light">
            <div class="content-lg container">
                <div class="row row-space-1">
                    <div class="col-sm-4 sm-margin-b-2">
                         Pricing
                        <div class="pricing">
                            <div class="margin-b-30">
                                <i class="pricing-icon icon-chemistry"></i>
                                <h3>Silver Package <span> - $</span> 74.99</h3>
                                <p>Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                            </div>
                            <ul class="list-unstyled pricing-list margin-b-50">
                                <li class="pricing-list-item">Starter Kit</li>
                                <li class="pricing-list-item">Basic Features</li>
                                <li class="pricing-list-item">Annual Report</li>
                            </ul>
                            <a href="pricing.html" class="btn-theme btn-theme-sm btn-default-bg text-uppercase">Start
                                Now</a>
                        </div>
                         End Pricing
                    </div>
                    <div class="col-sm-4 sm-margin-b-2">
                        Pricing
                        <div class="pricing pricing-active">
                            <div class="margin-b-30">
                                <i class="pricing-icon icon-badge"></i>
                                <h3>Gold Package <span> - $</span> 199.99</h3>
                                <p>Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                            </div>
                            <ul class="list-unstyled pricing-list margin-b-50">
                                <li class="pricing-list-item">Professional Kit</li>
                                <li class="pricing-list-item">Full Options</li>
                                <li class="pricing-list-item">Bi-anual Report</li>
                            </ul>
                            <a href="pricing.html" class="btn-theme btn-theme-sm btn-default-bg text-uppercase">Start
                                Now</a>
                        </div>
                        End Pricing
                    </div>
                    <div class="col-sm-4">
                        <Pricing
                        <div class="pricing">
                            <div class="margin-b-30">
                                <i class="pricing-icon icon-shield"></i>
                                <h3>Platinum Package <span> - $</span> 500</h3>
                                <p>Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                            </div>
                            <ul class="list-unstyled pricing-list margin-b-50">
                                <li class="pricing-list-item">Complete Kit</li>
                                <li class="pricing-list-item">Advanced Options</li>
                                <li class="pricing-list-item">Monthly Report</li>
                            </ul>
                            <a href="pricing.html" class="btn-theme btn-theme-sm btn-default-bg text-uppercase">Start
                                Now</a>
                        </div>
                         End Pricing
                    </div>
                </div>
                end row -->
    </div>
    </div>
    </div>
    <!-- End Pricing -->

    <!--========== END PAGE LAYOUT ==========-->

    <!--========== FOOTER ==========-->
    <footer class="footer">
        <!-- Links -->
        <!-- <div class="section-seperator">
                <div class="content-md container">
                    <div class="row">
                        <div class="col-sm-2 sm-margin-b-30">

                            <ul class="list-unstyled footer-list">
                                <li class="footer-list-item"><a href="#body">Home</a></li>
                                <li class="footer-list-item"><a href="#about">Team</a></li>
                                <li class="footer-list-item"><a href="#work">Credentials</a></li>
                                <li class="footer-list-item"><a href="#contact">Contact</a></li>
                            </ul>

                        </div>
                        <div class="col-sm-2 sm-margin-b-30">

                            <ul class="list-unstyled footer-list">
                                <li class="footer-list-item"><a href="#">Twitter</a></li>
                                <li class="footer-list-item"><a href="#">Facebook</a></li>
                                <li class="footer-list-item"><a href="#">Instagram</a></li>
                                <li class="footer-list-item"><a href="#">YouTube</a></li>
                            </ul>

                        </div>
                        <div class="col-sm-3">

                            <ul class="list-unstyled footer-list">
                                <li class="footer-list-item"><a href="#">Subscribe to Our Newsletter</a></li>
                                <li class="footer-list-item"><a href="#">Privacy Policy</a></li>
                                <li class="footer-list-item"><a href="#">Terms &amp; Conditions</a></li>
                            </ul>

                        </div>
                    </div>

                </div>
            </div>
            <!-- End Links -->

        <!-- Copyright -->
        <div class="content container">
            <div class="row">
                <div class="col-xs-6">
                    <img class="footer-logo" src="{{asset('landingpage/img/logo-dark.png')}}" alt="flameonepage Logo">
                </div>
                <div class="col-xs-6 text-right">
                    <p class="margin-b-0"><a class="fweight-700" href="#">FlameOnePage</a> Theme Powered by: Asrori <a
                            class="fweight-700" href="http://ft-seo.ch/">FairTech Studio</a></p>
                </div>
            </div>
            <!--// end row -->
        </div>
        <!-- End Copyright -->
    </footer>
    <!--========== END FOOTER ==========-->

    <!-- Back To Top -->
    <a href="javascript:void(0);" class="js-back-to-top back-to-top">Top</a>

    <!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->\

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <!-- CORE PLUGINS -->
    <script src="{{ asset('landingpage/vendor/jquery.min.js" type="text/javascript')}}"></script>
    <script src="{{ asset('landingpage/vendor/jquery-migrate.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('landingpage/vendor/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>

    <!-- PAGE LEVEL PLUGINS -->
    <script src="{{ asset('landingpage/vendor/jquery.easing.js')}}" type="text/javascript"></script>
    <script src="{{ asset('landingpage/vendor/jquery.back-to-top.js')}}" type="text/javascript"></script>
    <script src="{{ asset('landingpage/vendor/jquery.smooth-scroll.js')}}" type="text/javascript"></script>
    <script src="{{ asset('landingpage/vendor/jquery.wow.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('landingpage/vendor/swiper/js/swiper.jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('landingpage/vendor/masonry/jquery.masonry.pkgd.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('landingpage/vendor/masonry/imagesloaded.pkgd.min.js')}}" type="text/javascript"></script>

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('landingpage/js/layout.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('landingpage/js/components/wow.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('landingpage/js/components/swiper.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('landingpage/js/components/masonry.min.js')}}" type="text/javascript"></script>

</body>
<!-- END BODY -->

</html>
