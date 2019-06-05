<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home || Truemart Responsive Html5 Ecommerce Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset("vendor/truemart")}}/img/favicon.ico">
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/font-awesome.min.css">
    <!-- Ionicons css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/ionicons.min.css">
    <!-- linearicons css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/linearicons.css">
    <!-- Nice select css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/nice-select.css">
    <!-- Jquery fancybox css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/jquery.fancybox.css">
    <!-- Jquery ui price slider css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/jquery-ui.min.css">
    <!-- Meanmenu css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/meanmenu.min.css">
    <!-- Nivo slider css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/nivo-slider.css">
    <!-- Owl carousel css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/owl.carousel.min.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/bootstrap.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/default.css">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/responsive.css">

    <!-- Modernizer js -->
    <script src="{{asset("vendor/truemart")}}/js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Main Wrapper Start Here -->
<div class="wrapper">
    <!-- Banner Popup Start -->
    <div class="popup_banner">
        @include('shop::layouts.partials.popup-banner')
    </div>
    <!-- Banner Popup End -->
    <!-- Newsletter Popup Start -->
    <div class="popup_wrapper">
        @include('shop::layouts.partials.popup-wrapper')
    </div>
    <!-- Newsletter Popup End -->
    <!-- Main Header Area Start Here -->
    <header>
        @include('shop::layouts.partials.header-main')
    </header>
    <!-- Main Header Area End Here -->
    <!-- Categorie Menu & Slider Area Start Here -->
    <div class="main-page-banner pb-50 off-white-bg">
        <div class="container">
            <div class="row">
                @include('shop::layouts.partials.category-main')
                @include('shop::layouts.partials.slider')
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Categorie Menu & Slider Area End Here -->
    @include('shop::layouts.partials.banner-menu')
    @yield('content')
    @include('shop::layouts.partials.footer')
</div>
<!-- Main Wrapper End Here -->

<!-- jquery 3.2.1 -->
<script data-cfasync="false" src="{{asset("vendor/truemart")}}//cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{asset("vendor/truemart")}}/js/vendor/jquery-3.2.1.min.js"></script>
<!-- Countdown js -->
<script src="{{asset("vendor/truemart")}}/js/jquery.countdown.min.js"></script>
<!-- Mobile menu js -->
<script src="{{asset("vendor/truemart")}}/js/jquery.meanmenu.min.js"></script>
<!-- ScrollUp js -->
<script src="{{asset("vendor/truemart")}}/js/jquery.scrollUp.js"></script>
<!-- Nivo slider js -->
<script src="{{asset("vendor/truemart")}}/js/jquery.nivo.slider.js"></script>
<!-- Fancybox js -->
<script src="{{asset("vendor/truemart")}}/js/jquery.fancybox.min.js"></script>
<!-- Jquery nice select js -->
<script src="{{asset("vendor/truemart")}}/js/jquery.nice-select.min.js"></script>
<!-- Jquery ui price slider js -->
<script src="{{asset("vendor/truemart")}}/js/jquery-ui.min.js"></script>
<!-- Owl carousel -->
<script src="{{asset("vendor/truemart")}}/js/owl.carousel.min.js"></script>
<!-- Bootstrap popper js -->
<script src="{{asset("vendor/truemart")}}/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="{{asset("vendor/truemart")}}/js/bootstrap.min.js"></script>
<!-- Plugin js -->
<script src="{{asset("vendor/truemart")}}/js/plugins.js"></script>
<!-- Main activaion js -->
<script src="{{asset("vendor/truemart")}}/js/main.js"></script>
</body>

</html>