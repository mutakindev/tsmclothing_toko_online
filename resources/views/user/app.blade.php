<!DOCTYPE html>
<html lang="en">
  <head>
    <title>TSM Clothing</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('shopper') }}/fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{ asset('shopper') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('shopper') }}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('shopper') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('shopper') }}/css/owl.theme.default.min.css">


    <link rel="stylesheet" href="{{ asset('shopper') }}/css/aos.css">

    <link rel="stylesheet" href="{{ asset('shopper') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('css') }}/app.css">
    <link rel="stylesheet" href="{{ asset('tailwindcss') }}/app.css">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" /> --}}
    @yield('style')
  </head>
  <body>
  
    @include('user.components.header')
  <div class="site-wrap">

    @yield('content')
    
  </div>
  @include('user.components.footer')

  <script src="{{ asset('js') }}/alpine.js"></script>
  <script src="{{ asset('shopper') }}/js/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
  <script src="{{ asset('shopper') }}/js/jquery-ui.js"></script>
  <script src="{{ asset('shopper') }}/js/popper.min.js"></script>
  <script src="{{ asset('shopper') }}/js/bootstrap.min.js"></script>
  <script src="{{ asset('shopper') }}/js/owl.carousel.min.js"></script>
  <script src="{{ asset('shopper') }}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ asset('shopper') }}/js/aos.js"></script>

  <script src="{{ asset('shopper') }}/js/main.js"></script>
  <script>
    $('.owl-carousel').owlCarousel({
             center: false,
              items: 1,
              loop: true,
              margin: 5,
              autoplay: true,
          })
  
          AOS.init({
              duration: 800,
              easing: 'slide',
              once: true
          });
  </script>
  @yield('script')
    @yield('js')
  </body>
</html>