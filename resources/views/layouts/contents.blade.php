<!DOCTYPE html>
<html lang="en">

    <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">

      <title> Flex Store</title>
      <meta content="" name="description">
      <meta content="" name="keywords">

      <!-- Favicons -->
      <link href="{{asset('assets/products/products/favicon.png')}}" rel="icon">
      <link href="{{asset('assets/products/products/apple-touch-icon.png')}}" rel="apple-touch-icon">

      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

      <!-- Vendor CSS Files -->
      <link href="{{asset('assets/vendor__products/aos/aos.css')}}" rel="stylesheet">
      <link href="{{asset('assets/vendor__products/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{asset('assets/vendor__products/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
      <link href="{{asset('assets/vendor__products/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
      <link href="{{asset('assets/vendor__products/remixicon/remixicon.css')}}" rel="stylesheet">
      <link href="{{asset('assets/vendor__products/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

      <!-- Template Main CSS File -->
      <link href="{{asset('css/products_styles.css')}}" rel="stylesheet">

    </head>

    <body>
        <i class="bi bi-list mobile-nav-toggle"></i>
        @yield('content')

        @include('front.includes.footer')
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        <!-- Vendor JS Files -->
        <script src="{{asset('assets/vendor__products/purecounter/purecounter_vanilla.js')}}"></script>
        <script src="{{asset('assets/vendor__products/aos/aos.js')}}"></script>
        <script src="{{asset('assets/vendor__products/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/vendor__products/glightbox/js/glightbox.min.js')}}"></script>
        <script src="{{asset('assets/vendor__products/isotope-layout/isotope.pkgd.min.js')}}"></script><script src="{{asset('assets/vendor__products/swiper/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('assets/vendor__products/php-email-form/validate.js')}}"></script>
        <script src="{{asset('assets/vendor__products/swiper/swiper-bundle.min.js')}}.."></script>

        <!-- Template Main JS File -->
        <script src="{{asset('js/products_scripts.js')}}"></script>
    </body>


</html>




