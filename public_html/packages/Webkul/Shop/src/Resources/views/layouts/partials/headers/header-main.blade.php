<!-- Header Top Start Here -->
<div class="header-top-area">
    <div class="container">
        <!-- Header Top Start -->
        @include('shop::layouts.partials.headers.header-top')
        <!-- Header Top End -->
    </div>
    <!-- Container End -->
</div>
<!-- Header Top End Here -->
<!-- Header Middle Start Here -->
<div class="header-middle ptb-15">
    <div class="container">
        <div class="row align-items-center no-gutters">
            <div class="col-lg-3 col-md-12">
                <div class="logo mb-all-30">
                    <a href="index.html"><img src="{{asset("vendor/truemart")}}/img/logo/logo.png" alt="logo-image"></a>
                </div>
            </div>
            <!-- Categorie Search Box Start Here -->
            <div class="col-lg-5 col-md-8 ml-auto mr-auto col-10">
                @include('shop::layouts.partials.headers.search')
            </div>
            <!-- Categorie Search Box End Here -->
            <!-- Cart Box Start Here -->
            <div class="col-lg-4 col-md-12">
                @include('shop::layouts.partials.headers.cart-box')
            </div>
            <!-- Cart Box End Here -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Header Middle End Here -->
<!-- Header Bottom Start Here -->
<div class="header-bottom  header-sticky">
    <div class="container">
        @include('shop::layouts.partials.headers.menu-main')
    </div>
    <!-- Container End -->
</div>
<!-- Header Bottom End Here -->
<!-- Mobile Vertical Menu Start Here -->
<div class="container d-block d-lg-none">
    <div class="vertical-menu mt-30">
        <span class="categorie-title mobile-categorei-menu">{{ __('shop::app.menu.shop-by-categories') }}</span>
        <nav>
            <div id="cate-mobile-toggle" class="category-menu sidebar-menu sidbar-style mobile-categorei-menu-list menu-hidden ">
                <ul>
                    <li class="has-sub"><a href="#">Automotive & Motorcycle </a>
                        <ul class="category-sub">
                            <li class="has-sub">
                                <a href="shop.html">Office chair</a>
                                <ul class="category-sub">
                                    <li><a href="shop.html">Bibendum Cursus</a></li>
                                    <li><a href="shop.html">Dignissim Turpis</a></li>
                                    <li><a href="shop.html">Dining room</a></li>
                                    <li><a href="shop.html">Dining room</a></li>
                                </ul>
                            </li>
                            <li class="has-sub"><a href="shop.html">Purus Lacus</a>
                                <ul class="category-sub">
                                    <li><a href="shop.html">Magna Pellentesq</a></li>
                                    <li><a href="shop.html">Molestie Tortor</a></li>
                                    <li><a href="shop.html">Vehicula Element</a></li>
                                    <li><a href="shop.html">Sagittis Blandit</a></li>
                                </ul>
                            </li>
                            <li><a href="shop.html">gps accessories</a></li>
                            <li><a href="shop.html">Microphones</a></li>
                            <li><a href="shop.html">Wireless Transmitters</a></li>
                        </ul>
                        <!-- category submenu end-->
                    </li>
                    <li class="has-sub"><a href="#">Sports & Outdoors</a>
                        <ul class="category-sub">
                            <li class="menu-tile">Cameras</li>
                            <li><a href="shop.html">Cords and Cables</a></li>
                            <li><a href="shop.html">gps accessories</a></li>
                            <li><a href="shop.html">Microphones</a></li>
                            <li><a href="shop.html">Wireless Transmitters</a></li>
                        </ul>
                        <!-- category submenu end-->
                    </li>
                    <li class="has-sub"><a href="#">Home & Kitchen</a>
                        <ul class="category-sub">
                            <li><a href="shop.html">kithen one</a></li>
                            <li><a href="shop.html">kithen two</a></li>
                            <li><a href="shop.html">kithen three</a></li>
                            <li><a href="shop.html">kithen four</a></li>
                        </ul>
                        <!-- category submenu end-->
                    </li>
                    <li class="has-sub"><a href="#">Phones & Tablets</a>
                        <ul class="category-sub">
                            <li><a href="shop.html">phone one</a></li>
                            <li><a href="shop.html">Tablet two</a></li>
                            <li><a href="shop.html">Tablet three</a></li>
                            <li><a href="shop.html">phone four</a></li>
                        </ul>
                        <!-- category submenu end-->
                    </li>
                    <li class="has-sub"><a href="#">TV & Video</a>
                        <ul class="category-sub">
                            <li><a href="shop.html">smart tv</a></li>
                            <li><a href="shop.html">real video</a></li>
                            <li><a href="shop.html">Microphones</a></li>
                            <li><a href="shop.html">Wireless Transmitters</a></li>
                        </ul>
                        <!-- category submenu end-->
                    </li>
                    <li><a href="#">Beauty</a> </li>
                    <li><a href="#">Sport & tourisim</a></li>
                    <li><a href="#">Meat & Seafood</a></li>
                </ul>
            </div>
            <!-- category-menu-end -->
        </nav>
    </div>
</div>
<!-- Mobile Vertical Menu Start End -->