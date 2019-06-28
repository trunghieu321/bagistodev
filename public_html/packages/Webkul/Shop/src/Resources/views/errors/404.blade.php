@extends('shop::layouts.app')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><a href="404.html">404</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- Error 404 Area Start -->
    <div class="error404-area ptb-100 ptb-sm-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-wrapper text-center">
                        <div class="error-text">
                            <h1>404</h1>
                            <h2>Opps! PAGE NOT BE FOUND</h2>
                            <p>Sorry but the page you are looking for does not exist, have been removed, name changed or is temporarity unavailable.</p>
                        </div>
                        <div class="search-error">
                            <form id="search-form" action="#">
                                <input type="text" placeholder="Search">
                                <button><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="error-button">
                            <a href="index.html">Back to home page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Error 404 Area End -->
    <!-- Support Area Start Here -->
    <div class="support-area bdr-top">
        <div class="container">
            <div class="d-flex flex-wrap text-center">
                <div class="single-support">
                    <div class="support-icon">
                        <i class="lnr lnr-gift"></i>
                    </div>
                    <div class="support-desc">
                        <h6>Great Value</h6>
                        <span>Nunc id ante quis tellus faucibus dictum in eget.</span>
                    </div>
                </div>
                <div class="single-support">
                    <div class="support-icon">
                        <i class="lnr lnr-rocket" ></i>
                    </div>
                    <div class="support-desc">
                        <h6>Worlwide Delivery</h6>
                        <span>Quisque posuere enim augue, in rhoncus diam dictum non</span>
                    </div>
                </div>
                <div class="single-support">
                    <div class="support-icon">
                        <i class="lnr lnr-lock"></i>
                    </div>
                    <div class="support-desc">
                        <h6>Safe Payment</h6>
                        <span>Duis suscipit elit sem, sed mattis tellus accumsan.</span>
                    </div>
                </div>
                <div class="single-support">
                    <div class="support-icon">
                        <i class="lnr lnr-enter-down"></i>
                    </div>
                    <div class="support-desc">
                        <h6>Shop Confidence</h6>
                        <span>Faucibus dictum suscipit eget metus. Duis  elit sem, sed.</span>
                    </div>
                </div>
                <div class="single-support">
                    <div class="support-icon">
                        <i class="lnr lnr-users"></i>
                    </div>
                    <div class="support-desc">
                        <h6>24/7 Help Center</h6>
                        <span>Quisque posuere enim augue, in rhoncus diam dictum non.</span>
                    </div>
                </div>
            </div>
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