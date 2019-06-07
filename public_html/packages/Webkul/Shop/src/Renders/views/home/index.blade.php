@extends('shop::layouts.app')

@section('content')
    <!-- Hot Deal Products Start Here -->
    <div class="hot-deal-products off-white-bg pb-sm-50">
        @include('shop::home.host-deal-products')
    </div>
    <!-- Hot Deal Products End Here -->
    <!-- Hot Feature Products Start Here -->
    <div class="hot-feature-products off-white-bg pb-sm-50">
        @include('shop::home.featured-products')
    </div>
    <!-- Hot Deal Products End Here -->

    <!-- Arrivals Products Area Start Here -->
    <div class="arrivals-product pb-85 pb-sm-45">
        <div class="container">
            @include('shop::home.new-products')
        </div>
        <!-- Container End -->
    </div>
    <!-- Arrivals Products Area End Here -->
    <!-- Arrivals Products Area Start Here -->
    <div class="second-arrivals-product pb-45 pb-sm-5">
        <div class="container">
            @include('shop::home.best-seller-products')
        </div>
        <!-- Container End -->
    </div>
    <!-- Arrivals Products Area End Here -->
    <!-- Like Products Area Start Here -->
    <div class="like-product ptb-95 off-white-bg pt-sm-50 pb-sm-55 ">
        <div class="container">
           @include('shop::home.you-like-products')
        </div>
        <!-- Container End -->
    </div>
@endsection

@push('head_css')
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
@endpush

@push('footer_js')
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
@endpush