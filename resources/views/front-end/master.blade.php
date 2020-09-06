<!DOCTYPE html>
<html lang="en">
<head>
    <title>aStar</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="aStar Fashion Template Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/styles/bootstrap-4.1.3/bootstrap.css">
    <link href="{{asset('/')}}frontend/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/styles/responsive.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/styles/cart.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/styles/cart_responsive.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/styles/product.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/styles/product_responsive.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

<div class="super_container" id="app">
    {{--<example-component></example-component>--}}
    {{--<!-- Header -->--}}
    {{--<front-home></front-home>--}}
    <front-header></front-header>
    <!-- Menu -->
    <!-- Sidebar -->

    <front-sidebar></front-sidebar>
    <!-- Home -->

    <front-main></front-main>
    @yield('body')
    <!-- Newsletter -->

    <front-footer></front-footer>

</div>

<script src="{{asset('/')}}frontend/js/jquery-3.2.1.min.js"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{asset('/')}}frontend/styles/bootstrap-4.1.3/popper.js"></script>
<script src="{{asset('/')}}frontend/styles/bootstrap-4.1.3/bootstrap.min.js"></script>
<script src="{{asset('/')}}frontend/plugins/greensock/TweenMax.min.js"></script>
<script src="{{asset('/')}}frontend/plugins/greensock/TimelineMax.min.js"></script>
<script src="{{asset('/')}}frontend/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="{{asset('/')}}frontend/plugins/greensock/animation.gsap.min.js"></script>
<script src="{{asset('/')}}frontend/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="{{asset('/')}}frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="{{asset('/')}}frontend/plugins/easing/easing.js"></script>
<script src="{{asset('/')}}frontend/plugins/parallax-js-master/parallax.min.js"></script>
<script src="{{asset('/')}}frontend/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="{{asset('/')}}frontend/plugins/Isotope/fitcolumns.js"></script>
<script src="{{asset('/')}}frontend/js/custom.js"></script>
<script src="{{asset('/')}}frontend/js/cart.js"></script>

</body>
</html>