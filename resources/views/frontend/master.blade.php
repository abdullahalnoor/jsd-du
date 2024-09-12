<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title> @yield('title') - {{config('app.name')}}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/frontend/img/favicon.svg')}}" rel="icon">
  <!-- <link href="{{asset('assets/frontend/')}}/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/frontend/')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('assets/frontend/')}}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('assets/frontend/')}}/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{asset('assets/frontend/')}}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{asset('assets/frontend/')}}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="{{asset('assets/frontend/')}}/css/variables.css" rel="stylesheet">
  <!-- <link href="{{asset('assets/frontend/')}}/css/variables-blue.css" rel="stylesheet"> -->
  <!-- <link href="{{asset('assets/frontend/')}}/css/variables-green.css" rel="stylesheet"> -->
  <!-- <link href="{{asset('assets/frontend/')}}/css/variables-orange.css" rel="stylesheet"> -->
  <!-- <link href="{{asset('assets/frontend/')}}/css/variables-purple.css" rel="stylesheet"> -->
  <!-- <link href="{{asset('assets/frontend/')}}/css/variables-red.css" rel="stylesheet"> -->
  <!-- <link href="{{asset('assets/frontend/')}}/css/variables-pink.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/frontend/')}}/css/main.css" rel="stylesheet">
  
  @stack('styles')
  
</style>
</head>

<body>
  
    @include('frontend.includes.header')

  <!-- <section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
      <img src="{{asset('assets/frontend/')}}/img/hero-carousel/hero-carousel-3.svg" class="img-fluid animated">
      <h2>Welcome to <span>HeroBiz</span></h2>
      <p>Et voluptate esse accusantium accusamus natus reiciendis quidem voluptates similique aut.</p>
      <div class="d-flex">
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
      </div>
    </div>
  </section> -->

  <main id="main">
  @yield("content")
</main>
  <!-- End #main -->



  <!-- ======= Footer ======= -->
      @include('frontend.includes.footer')
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/frontend/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('assets/frontend/')}}/vendor/aos/aos.js"></script>
  <script src="{{asset('assets/frontend/')}}/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{asset('assets/frontend/')}}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{asset('assets/frontend/')}}/vendor/swiper/swiper-bundle.min.js"></script>
 
  <!-- Template Main JS File -->
  <script src="{{asset('assets/frontend/')}}/js/main.js"></script>
  <script src="{{asset('assets/frontend/')}}/js/wordcloud.js"></script>
 
  @stack('scripts')
  

</body>

</html>