<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ __('shop::app.head.title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset("themes/truemart/assets")}}/img/favicon.ico">
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="{{asset("themes/truemart/assets")}}/css/font-awesome.min.css">
    <!-- Ionicons css -->
    <link rel="stylesheet" href="{{asset("themes/truemart/assets")}}/css/ionicons.min.css">
    <!-- linearicons css -->
    <link rel="stylesheet" href="{{asset("themes/truemart/assets")}}/css/linearicons.css">
    <!-- Nice select css -->
    <link rel="stylesheet" href="{{asset("themes/truemart/assets")}}/css/nice-select.css">
    <!-- Jquery fancybox css -->
    <link rel="stylesheet" href="{{asset("themes/truemart/assets")}}/css/jquery.fancybox.css">
    <!-- Jquery ui price slider css -->
    <link rel="stylesheet" href="{{asset("themes/truemart/assets")}}/css/jquery-ui.min.css">
    <!-- Meanmenu css -->
    <link rel="stylesheet" href="{{asset("themes/truemart/assets")}}/css/meanmenu.min.css">
    <!-- Nivo slider css -->
    <link rel="stylesheet" href="{{asset("themes/truemart/assets")}}/css/nivo-slider.css">
    <!-- Owl carousel css -->
    <link rel="stylesheet" href="{{asset("themes/truemart/assets")}}/css/owl.carousel.min.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{asset("themes/truemart/assets")}}/css/bootstrap.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="{{asset("themes/truemart/assets")}}/css/default.css">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset("themes/truemart/assets")}}/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset("themes/truemart/assets")}}/css/responsive.css">

    <!-- Modernizer js -->
    <script src="{{asset("themes/truemart/assets")}}/js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
<!-- Main Wrapper Start Here -->
<div class="wrapper">
    <!-- Banner Popup Start -->
    <div class="popup_banner">
        @include('shop::layouts.partials.headers.popup-banner')
    </div>
    <!-- Banner Popup End -->
    <!-- Newsletter Popup Start -->
    <div class="popup_wrapper">
        @include('shop::layouts.partials.headers.popup-wrapper')
    </div>
    <!-- Newsletter Popup End -->
    <!-- Main Header Area Start Here -->
    <header>
        @include('shop::layouts.partials.headers.header-main')
    </header>
    <!-- Categorie Menu & Slider Area Start Here -->
    <div class="main-page-banner off-white-bg">
        <div class="container">
            <div class="row">
                @include('shop::layouts.partials.category-main')
                @include('shop::layouts.partials.slider')
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Main Header Area End Here -->
    @yield('content')
    @include('shop::layouts.partials.footers.footer')
</div>
<!-- Main Wrapper End Here -->
@stack('footer_js')
<!-- jquery 3.2.1 -->
<script src="{{asset("themes/truemart/assets")}}/js/vendor/jquery-3.2.1.min.js"></script>
<!-- Countdown js -->
<script src="{{asset("themes/truemart/assets")}}/js/jquery.countdown.min.js"></script>
<!-- Mobile menu js -->
<script src="{{asset("themes/truemart/assets")}}/js/jquery.meanmenu.min.js"></script>
<!-- ScrollUp js -->
<script src="{{asset("themes/truemart/assets")}}/js/jquery.scrollUp.js"></script>
<!-- Nivo slider js -->
<script src="{{asset("themes/truemart/assets")}}/js/jquery.nivo.slider.js"></script>
<!-- Fancybox js -->
<script src="{{asset("themes/truemart/assets")}}/js/jquery.fancybox.min.js"></script>
<!-- Jquery nice select js -->
<script src="{{asset("themes/truemart/assets")}}/js/jquery.nice-select.min.js"></script>
<!-- Jquery ui price slider js -->
<script src="{{asset("themes/truemart/assets")}}/js/jquery-ui.min.js"></script>
<!-- Owl carousel -->
<script src="{{asset("themes/truemart/assets")}}/js/owl.carousel.min.js"></script>
<!-- Bootstrap popper js -->
<script src="{{asset("themes/truemart/assets")}}/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="{{asset("themes/truemart/assets")}}/js/bootstrap.min.js"></script>
<!-- Plugin js -->
<script src="{{asset("themes/truemart/assets")}}/js/plugins.js"></script>
<!-- Main activaion js -->
<script src="{{asset("themes/truemart/assets")}}/js/main.js"></script>
<script src="{{asset("themes/truemart/assets")}}/js/app.js"></script>

</body>

</html>