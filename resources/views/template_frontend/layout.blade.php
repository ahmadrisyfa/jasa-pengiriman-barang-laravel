<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jasa Pengiriman Barang</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('frontend')}}/assets/img/favicon.png" rel="icon">
  <link href="{{asset('frontend')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('frontend')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('frontend')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('frontend')}}/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="{{asset('frontend')}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{asset('frontend')}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="{{asset('frontend')}}/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('frontend')}}/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Logis
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
 
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{url('/')}}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="{{asset('frontend')}}/assets/img/logo.png" alt=""> -->
        <h1>Delivery Express</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{url('/')}}" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#daftar_kurir">Daftar Kurir</a></li>
          @auth
          <li class="dropdown"><a href="#"><span>{{auth()->user()->name}}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="{{url('/profile')}}">profile</a></li>                         
              @if (auth()->user()->admin == 1)
              <li><a href="{{url('/admin/dashboard')}}">Ke Dashboard</a></li>                                           
              @endif
                @php
                 $userAlreadyRegistered = \App\Models\daftar_kurir::where('user_id', auth()->user()->id)->where('status',1)->exists();   
                @endphp
                <div>
                  @if($userAlreadyRegistered)
                  <li><a href="{{url('/daftar_pesanan_kurir')}}">Daftar Pesanan Kurir</a></li> 
                   <li><a href="{{url('/edit_profil_kurir')}}">Edit profile Kurir Anda</a></li>                                           
                      
                  @endif
                </div>
               
              <li><a href="{{url('/logout')}}">Logout</a></li>  

            </ul>
          </li>
          @else
          <li class="dropdown"><a href="#"><span>Login</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="{{url('/login')}}">Login</a></li>  
              <li><a href="{{url('/register')}}">Register</a></li>                         

            </ul>
          </li>
          @endauth
          <li><a href="#contact">Contact</a></li>

         

        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
    @yield('content')
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="contact" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="{{url('/')}}" class="logo d-flex align-items-center">
            <span>Delivery Express</span>
          </a>
          <p>Siap mengirim barang anda dalam waktu cepat dan aman.</p>
          <div class="social-links d-flex mt-4">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Links</h4>
          <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="#about">About us</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="{{url('/logout')}}">logout</a></li>
          </ul>
        </div>
    
        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>
            Jl. Kelet Ploso KM 36, Kelet, Keling, Jepara, Jawa Tengah
            <br><br>
            <strong>Phone:</strong> +62 8756 4857 488<br>
            <strong>Email:</strong> Deliverystan@gmail.com<br>
          </p>

        </div>

      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Instant</span></strong>. All Rights Reserved
      </div>
      
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('frontend')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('frontend')}}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{asset('frontend')}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{asset('frontend')}}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{asset('frontend')}}/assets/vendor/aos/aos.js"></script>
  <script src="{{asset('frontend')}}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('frontend')}}/assets/js/main.js"></script>

</body>

</html>