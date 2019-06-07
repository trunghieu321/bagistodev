<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ __('shop::app.head.title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @stack('head_css')
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
    <!-- Main Header Area End Here -->
    @yield('content')
    @include('shop::layouts.partials.footers.footer')
</div>
<!-- Main Wrapper End Here -->
@stack('footer_js')

</body>

</html>