<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TSM Clothing</title>
    <link rel="stylesheet" href="{{ asset('tailwindcss') }}/app.css" />
    <link rel="shortcut icon" href="{{ asset('adminassets') }}/assets/images/favicon.png" />
    <link rel="stylesheet" href="{{ asset('shopper/css') }}/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ asset('shopper/css') }}/owl.theme.default.min.css" />
    <link rel="stylesheet" href="{{ asset('shopper') }}/fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{ asset('shopper') }}/css/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    @yield('style')
</head>

<body class="font-poppins">
    @include('user.components.header')
    @yield('content')
    @include('user.components.footer')

    <script src="{{ asset('js/alpine.js') }}" defer></script>
    <script src="{{ asset('shopper') }}/js/jquery-3.3.1.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script> --}}
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
</body>

</html>