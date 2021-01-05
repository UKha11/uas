<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>SISKOP</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Cleaning Company Website Template" name="keywords">
        <meta content="Cleaning Company Website Template" name="description">

        <!-- Favicon -->
        <link href="img/logo.png" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{ asset('loginas/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{ asset('loginas/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('loginas/css/style.css')}}" rel="stylesheet">
    </head>

    <body>
        <div class="wrapper">
            <!-- Header Start -->
            <div class="header home">
                <div class="container-fluid">
                    <div class="header-top row align-items-center">
                        <div class="col-lg-3">
                            <div class="brand">
                                <a href="/">

                                    <img src="{{ asset('loginas/img/logo.png')}}" alt="Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="topbar">
                                <div class="topbar-col">
                                    <a href="tel:+012 345 67890"><i class="fa fa-phone-alt"></i>+012 345 67890</a>
                                </div>
                                <div class="topbar-col">
                                    <a href="mailto:info@example.com"><i class="fa fa-envelope"></i>kopma@unej.ac.id</a>
                                </div>
                                <div class="topbar-col">
                                    <div class="topbar-social">
                                        <a href="https://instagram.com/kopmaunej"><i class="fab fa-instagram"></i></a>
                                        <a href="https://twitter.com/kopmaunej_ofc"><i class="fab fa-twitter"></i></a>
                                        <a href="https://www.youtube.com/channel/UCXEVYPuDoLzZu2X0ZpYkVFQ"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hero row align-items-center">
                        <div class="col-md-7">
                            <h2>Sistem Informasi Koperasi</h2>
                            <h2><span>UKM Koperasi Mahasiswa</span>
                            <h2><span>Universitas Jember</span>
                        </div>
                        <div class="col-md-5">
                            <div class="form">
                                <h3>Signin to Your Account</h3>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail (admin@koperasi.com)">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" placeholder="Password (admin)">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                     @enderror
                                    <button class="btn btn-block">Sign In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header End -->


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('loginas/lib/easing/easing.min.js')}}"></script>
        <script src="{{ asset('loginas/lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('loginas/lib/isotope/isotope.pkgd.min.js')}}"></script>
        <script src="{{ asset('loginas/lib/lightbox/js/lightbox.min.js')}}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('js/main.js')}}"></script>
    </body>
</html>


{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Amanda">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/amanda/img/amanda-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/amanda">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/amanda/img/amanda-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/amanda/img/amanda-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">


    <title>Koperasi</title>

    <!-- vendor css -->
    <link href="{{ asset("lib/font-awesome/css/font-awesome.css")}}" rel="stylesheet">
    <link href="{{ asset("lib/Ionicons/css/ionicons.css")}}" rel="stylesheet">
    <link href="{{ asset("lib/perfect-scrollbar/css/perfect-scrollbar.css")}}" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="{{ asset("css/amanda.css")}}">
  </head>

  <body>

    <div class="am-signin-wrapper">
      <div class="am-signin-box">
        <div class="row no-gutters">
            <div class="col-lg-5">
                <div>
                  <h2>KOPERASI</h2>
                </div>
              </div>
          <div class="col-lg-7">
            <h5 class="tx-gray-800 mg-b-25">Signin to Your Account</h5>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label class="form-control-label">Email:</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div><!-- form-group -->

                <div class="form-group">
                <label class="form-control-label">Password:</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" placeholder="Enter your password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div><!-- form-group -->

                <button type="submit" class="btn btn-block">Sign In</button>
            </form>
          </div><!-- col-7 -->
        </div><!-- row -->
      </div><!-- signin-box -->
    </div><!-- am-signin-wrapper -->

    <script src="{{ asset("loginas/lib/jquery/jquery.js")}}"></script>
    <script src="{{ asset("loginas/lib/popper.js/popper.js")}}"></script>
    <script src="{{ asset("loginas/lib/bootstrap/bootstrap.js")}}"></script>
    <script src="{{ asset("loginas/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js")}}"></script>

    <script src="{{ asset("loginas/js/amanda.js")}}"></script>
  </body>
</html>
 --}}
