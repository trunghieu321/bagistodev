@extends('shop::layouts.app')
@section('content')
    @php
        $routeName = "shop.search.index";
        $lastLi = "Product";
        $nextLi = "Search";
    @endphp
    @include('shop::layouts.partials.breadcrumb', [ 'routeName' => $routeName,
                                                    'key' => [],
                                                    'lastLi' => $lastLi,
                                                    'nextLi' => $nextLi
                                                    ])
    @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
    <div class="main-shop-page pt-20 pb-20 ptb-sm-60">
        <div class="container">
            <!-- Row End -->
            <div class="row">
                <!-- Sidebar Shopping Option Start -->
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="sidebar">
                        <!-- Sidebar Electronics Categorie Start -->
                        <div class="electronics mb-40">
                            <h3 class="sidebar-title">Electronics</h3>
                            <div id="shop-cate-toggle" class="category-menu sidebar-menu sidbar-style">
                                <ul>
                                    <li class="has-sub"><a href="#">Camera</a>
                                        <ul class="category-sub">
                                            <li><a href="shop.html">Cords and Cables</a></li>
                                            <li><a href="shop.html">gps accessories</a></li>
                                            <li><a href="shop.html">Microphones</a></li>
                                            <li><a href="shop.html">Wireless Transmitters</a></li>
                                        </ul>
                                        <!-- category submenu end-->
                                    </li>
                                    <li class="has-sub"><a href="#">gamepad</a>
                                        <ul class="category-sub">
                                            <li><a href="shop.html">cube lifestyle hd</a></li>
                                            <li><a href="shop.html">gopro hero4</a></li>
                                            <li><a href="shop.html">bhandycam cx405ags</a></li>
                                            <li><a href="shop.html">vixia hf r600</a></li>
                                        </ul>
                                        <!-- category submenu end-->
                                    </li>
                                    <li class="has-sub"><a href="#">Digital Cameras</a>
                                        <ul class="category-sub">
                                            <li><a href="shop.html">Gold eye</a></li>
                                            <li><a href="shop.html">Questek</a></li>
                                            <li><a href="shop.html">Snm</a></li>
                                            <li><a href="shop.html">vantech</a></li>
                                        </ul>
                                        <!-- category submenu end-->
                                    </li>
                                    <li class="has-sub"><a href="#">Virtual Reality</a>
                                        <ul class="category-sub">
                                            <li><a href="shop.html">Samsung</a></li>
                                            <li><a href="shop.html">Toshiba</a></li>
                                            <li><a href="shop.html">Transcend</a></li>
                                            <li><a href="shop.html">Sandisk</a></li>
                                        </ul>
                                        <!-- category submenu end-->
                                    </li>
                                </ul>
                            </div>
                            <!-- category-menu-end -->
                        </div>
                        <!-- Sidebar Electronics Categorie End -->
                        <!-- Price Filter Options Start -->
                        <div class="search-filter mb-40">
                            <h3 class="sidebar-title">filter by price</h3>
                            <form action="#" class="sidbar-style">
                                <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 85%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 85%;"></span></div>
                                <input type="text" id="amount" class="amount-range" readonly="">
                            </form>
                        </div>
                        <!-- Price Filter Options End -->
                        <!-- Sidebar Categorie Start -->
                        <div class="sidebar-categorie mb-40">
                            <h3 class="sidebar-title">categories</h3>
                            <ul class="sidbar-style">
                                <li class="form-check">
                                    <input class="form-check-input" value="#" id="camera" type="checkbox">
                                    <label class="form-check-label" for="camera">Cameras (8)</label>
                                </li>
                                <li class="form-check">
                                    <input class="form-check-input" value="#" id="GamePad" type="checkbox">
                                    <label class="form-check-label" for="GamePad">GamePad (8)</label>
                                </li>
                                <li class="form-check">
                                    <input class="form-check-input" value="#" id="Digital" type="checkbox">
                                    <label class="form-check-label" for="Digital">Digital Cameras (8)</label>
                                </li>
                                <li class="form-check">
                                    <input class="form-check-input" value="#" id="Virtual" type="checkbox">
                                    <label class="form-check-label" for="Virtual"> Virtual Reality (8) </label>
                                </li>
                            </ul>
                        </div>
                        <!-- Sidebar Categorie Start -->
                        <!-- Product Size Start -->
                        <div class="size mb-40">
                            <h3 class="sidebar-title">size</h3>
                            <ul class="size-list sidbar-style">
                                <li class="form-check">
                                    <input class="form-check-input" value="" id="small" type="checkbox">
                                    <label class="form-check-label" for="small">S (6)</label>
                                </li>
                                <li class="form-check">
                                    <input class="form-check-input" value="" id="medium" type="checkbox">
                                    <label class="form-check-label" for="medium">M (9)</label>
                                </li>
                                <li class="form-check">
                                    <input class="form-check-input" value="" id="large" type="checkbox">
                                    <label class="form-check-label" for="large">L (8)</label>
                                </li>
                            </ul>
                        </div>
                        <!-- Product Size End -->
                        <!-- Product Color Start -->
                        <div class="color mb-40">
                            <h3 class="sidebar-title">color</h3>
                            <ul class="color-option sidbar-style">
                                <li>
                                    <span class="white"></span>
                                    <a href="#">white (4)</a>
                                </li>
                                <li>
                                    <span class="orange"></span>
                                    <a href="#">Orange (2)</a>
                                </li>
                                <li>
                                    <span class="blue"></span>
                                    <a href="#">Blue (6)</a>
                                </li>
                                <li>
                                    <span class="yellow"></span>
                                    <a href="#">Yellow (8)</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Product Color End -->
                        <!-- Product Top Start -->
                        <div class="top-new mb-40">
                            <h3 class="sidebar-title">Top New</h3>
                            <div class="side-product-active owl-carousel owl-loaded owl-drag">
                                <!-- Side Item Start -->

                                <!-- Side Item End -->
                                <!-- Side Item Start -->

                                <!-- Side Item End -->
                                <!-- Side Item Start -->

                                <!-- Side Item End -->
                                <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 810px;"><div class="owl-item active" style="width: 270px;"><div class="side-pro-item">
                                                <!-- Single Product Start -->
                                                <div class="single-product single-product-sidebar">
                                                    <!-- Product Image Start -->
                                                    <div class="pro-img">
                                                        <a href="product.html">
                                                            <img class="primary-img" src="img/products/20.jpg" alt="single-product">
                                                            <img class="secondary-img" src="img/products/19.jpg" alt="single-product">
                                                        </a>
                                                        <div class="label-product l_sale">30<span class="symbol-percent">%</span></div>
                                                    </div>
                                                    <!-- Product Image End -->
                                                    <!-- Product Content Start -->
                                                    <div class="pro-content">
                                                        <h4><a href="product.html">Work Lamp Silver Proin</a></h4>
                                                        <p><span class="price">$130.45</span><del class="prev-price">180.50</del></p>
                                                    </div>
                                                    <!-- Product Content End -->
                                                </div>
                                                <!-- Single Product End -->
                                                <!-- Single Product Start -->
                                                <div class="single-product single-product-sidebar">
                                                    <!-- Product Image Start -->
                                                    <div class="pro-img">
                                                        <a href="product.html">
                                                            <img class="primary-img" src="img/products/2.jpg" alt="single-product">
                                                            <img class="secondary-img" src="img/products/1.jpg" alt="single-product">
                                                        </a>
                                                    </div>
                                                    <!-- Product Image End -->
                                                    <!-- Product Content Start -->
                                                    <div class="pro-content">
                                                        <h4><a href="product.html">Silver Work Lamp  Proin</a></h4>
                                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                                    </div>
                                                    <!-- Product Content End -->
                                                </div>
                                                <!-- Single Product End -->
                                                <!-- Single Product Start -->
                                                <div class="single-product single-product-sidebar">
                                                    <!-- Product Image Start -->
                                                    <div class="pro-img">
                                                        <a href="product.html">
                                                            <img class="primary-img" src="img/products/3.jpg" alt="single-product">
                                                            <img class="secondary-img" src="img/products/4.jpg" alt="single-product">
                                                        </a>
                                                    </div>
                                                    <!-- Product Image End -->
                                                    <!-- Product Content Start -->
                                                    <div class="pro-content">
                                                        <h4><a href="product.html">Proin Work Lamp Silver </a></h4>
                                                        <p><span class="price">$150.45</span><del class="prev-price">$200.50</del></p>
                                                    </div>
                                                    <!-- Product Content End -->
                                                </div>
                                                <!-- Single Product End -->
                                                <!-- Single Product Start -->
                                                <div class="single-product single-product-sidebar">
                                                    <!-- Product Image Start -->
                                                    <div class="pro-img">
                                                        <a href="product.html">
                                                            <img class="primary-img" src="img/products/25.jpg" alt="single-product">
                                                            <img class="secondary-img" src="img/products/26.jpg" alt="single-product">
                                                        </a>
                                                    </div>
                                                    <!-- Product Image End -->
                                                    <!-- Product Content Start -->
                                                    <div class="pro-content">
                                                        <h4><a href="product.html">Work Lamp Silver Proin</a></h4>
                                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                                    </div>
                                                    <!-- Product Content End -->
                                                </div>
                                                <!-- Single Product End -->
                                            </div></div><div class="owl-item" style="width: 270px;"><div class="side-pro-item">
                                                <!-- Single Product Start -->
                                                <div class="single-product single-product-sidebar">
                                                    <!-- Product Image Start -->
                                                    <div class="pro-img">
                                                        <a href="product.html">
                                                            <img class="primary-img" src="img/products/41.jpg" alt="single-product">
                                                            <img class="secondary-img" src="img/products/42.jpg" alt="single-product">
                                                        </a>
                                                    </div>
                                                    <!-- Product Image End -->
                                                    <!-- Product Content Start -->
                                                    <div class="pro-content">
                                                        <h4><a href="product.html">Silver Work Lamp  Proin</a></h4>
                                                        <p><span class="price">$80.45</span><del class="prev-price">$100.50</del></p>
                                                    </div>
                                                    <!-- Product Content End -->
                                                </div>
                                                <!-- Single Product End -->
                                                <!-- Single Product Start -->
                                                <div class="single-product single-product-sidebar">
                                                    <!-- Product Image Start -->
                                                    <div class="pro-img">
                                                        <a href="product.html">
                                                            <img class="primary-img" src="img/products/36.jpg" alt="single-product">
                                                            <img class="secondary-img" src="img/products/35.jpg" alt="single-product">
                                                        </a>
                                                    </div>
                                                    <!-- Product Image End -->
                                                    <!-- Product Content Start -->
                                                    <div class="pro-content">
                                                        <h4><a href="product.html">Silver Work Lamp  Proin</a></h4>
                                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                                    </div>
                                                    <!-- Product Content End -->
                                                </div>
                                                <!-- Single Product End -->
                                                <!-- Single Product Start -->
                                                <div class="single-product single-product-sidebar">
                                                    <!-- Product Image Start -->
                                                    <div class="pro-img">
                                                        <a href="product.html">
                                                            <img class="primary-img" src="img/products/33.jpg" alt="single-product">
                                                            <img class="secondary-img" src="img/products/34.jpg" alt="single-product">
                                                        </a>
                                                    </div>
                                                    <!-- Product Image End -->
                                                    <!-- Product Content Start -->
                                                    <div class="pro-content">
                                                        <h4><a href="product.html">Lamp Proin Work  Silver </a></h4>
                                                        <p><span class="price">$120.45</span><del class="prev-price">130.50</del></p>
                                                    </div>
                                                    <!-- Product Content End -->
                                                </div>
                                                <!-- Single Product End -->
                                                <!-- Single Product Start -->
                                                <div class="single-product single-product-sidebar">
                                                    <!-- Product Image Start -->
                                                    <div class="pro-img">
                                                        <a href="product.html">
                                                            <img class="primary-img" src="img/products/31.jpg" alt="single-product">
                                                            <img class="secondary-img" src="img/products/32.jpg" alt="single-product">
                                                        </a>
                                                    </div>
                                                    <!-- Product Image End -->
                                                    <!-- Product Content Start -->
                                                    <div class="pro-content">
                                                        <h4><a href="product.html">Work Lamp Silver Proin</a></h4>
                                                        <p><span class="price">$140.45</span><del class="prev-price">$150.50</del></p>
                                                    </div>
                                                    <!-- Product Content End -->
                                                </div>
                                                <!-- Single Product End -->
                                            </div></div><div class="owl-item" style="width: 270px;"><div class="side-pro-item">
                                                <!-- Single Product Start -->
                                                <div class="single-product single-product-sidebar">
                                                    <!-- Product Image Start -->
                                                    <div class="pro-img">
                                                        <a href="product.html">
                                                            <img class="primary-img" src="img/products/15.jpg" alt="single-product">
                                                            <img class="secondary-img" src="img/products/16.jpg" alt="single-product">
                                                        </a>
                                                    </div>
                                                    <!-- Product Image End -->
                                                    <!-- Product Content Start -->
                                                    <div class="pro-content">
                                                        <h4><a href="product.html">Lamp Work Silver Proin</a></h4>
                                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                                    </div>
                                                    <!-- Product Content End -->
                                                </div>
                                                <!-- Single Product End -->
                                                <!-- Single Product Start -->
                                                <div class="single-product single-product-sidebar">
                                                    <!-- Product Image Start -->
                                                    <div class="pro-img">
                                                        <a href="product.html">
                                                            <img class="primary-img" src="img/products/17.jpg" alt="single-product">
                                                            <img class="secondary-img" src="img/products/18.jpg" alt="single-product">
                                                        </a>
                                                        <div class="label-product l_sale">30<span class="symbol-percent">%</span></div>
                                                    </div>
                                                    <!-- Product Image End -->
                                                    <!-- Product Content Start -->
                                                    <div class="pro-content">
                                                        <h4><a href="product.html">Silver Work Lamp  Proin</a></h4>
                                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                                    </div>
                                                    <!-- Product Content End -->
                                                </div>
                                                <!-- Single Product End -->
                                                <!-- Single Product Start -->
                                                <div class="single-product single-product-sidebar">
                                                    <!-- Product Image Start -->
                                                    <div class="pro-img">
                                                        <a href="product.html">
                                                            <img class="primary-img" src="img/products/23.jpg" alt="single-product">
                                                            <img class="secondary-img" src="img/products/24.jpg" alt="single-product">
                                                        </a>
                                                    </div>
                                                    <!-- Product Image End -->
                                                    <!-- Product Content Start -->
                                                    <div class="pro-content">
                                                        <h4><a href="product.html">Proin Work Lamp Silver </a></h4>
                                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                                    </div>
                                                    <!-- Product Content End -->
                                                </div>
                                                <!-- Single Product End -->
                                                <!-- Single Product Start -->
                                                <div class="single-product single-product-sidebar">
                                                    <!-- Product Image Start -->
                                                    <div class="pro-img">
                                                        <a href="product.html">
                                                            <img class="primary-img" src="img/products/25.jpg" alt="single-product">
                                                            <img class="secondary-img" src="img/products/26.jpg" alt="single-product">
                                                        </a>
                                                    </div>
                                                    <!-- Product Image End -->
                                                    <!-- Product Content Start -->
                                                    <div class="pro-content">
                                                        <h4><a href="product.html">Work Lamp Silver Proin</a></h4>
                                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                                    </div>
                                                    <!-- Product Content End -->
                                                </div>
                                                <!-- Single Product End -->
                                            </div></div></div></div><div class="owl-nav disabled"><div class="owl-prev"><i class="lnr lnr-arrow-left"></i></div><div class="owl-next"><i class="lnr lnr-arrow-right"></i></div></div><div class="owl-dots disabled"></div></div>
                        </div>
                        <!-- Product Top End -->
                        <!-- Single Banner Start -->
                        <div class="col-img">
                            <a href="shop.html"><img src="img/banner/banner-sidebar.jpg" alt="slider-banner"></a>
                        </div>
                        <!-- Single Banner End -->
                    </div>
                </div>
                <!-- Sidebar Shopping Option End -->
                <!-- Product Categorie List Start -->
                <div class="col-lg-9 order-1 order-lg-2">
                    <!-- Grid & List View Start -->
                    <div class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
                        <div class="grid-list-view  mb-sm-15">
                            <ul class="nav tabs-area d-flex align-items-center">
                                <li><a class="active" data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                <li><a data-toggle="tab" href="#list-view"><i class="fa fa-list-ul"></i></a></li>
                            </ul>
                        </div>
                        <!-- Toolbar Short Area Start -->
                        <div class="main-toolbar-sorter clearfix">
                            <div class="toolbar-sorter d-flex align-items-center">
                                <label>Sort By:</label>
                                <select class="sorter wide" style="display: none;">
                                    <option value="Position">Relevance</option>
                                    <option value="Product Name">Neme, A to Z</option>
                                    <option value="Product Name">Neme, Z to A</option>
                                    <option value="Price">Price low to heigh</option>
                                    <option value="Price" selected="">Price heigh to low</option>
                                </select><div class="nice-select sorter wide" tabindex="0"><span class="current">Price heigh to low</span><ul class="list"><li data-value="Position" class="option">Relevance</li><li data-value="Product Name" class="option">Neme, A to Z</li><li data-value="Product Name" class="option">Neme, Z to A</li><li data-value="Price" class="option">Price low to heigh</li><li data-value="Price" class="option selected">Price heigh to low</li></ul></div>
                            </div>
                        </div>
                        <!-- Toolbar Short Area End -->
                        <!-- Toolbar Short Area Start -->
                        <div class="main-toolbar-sorter clearfix">
                            <div class="toolbar-sorter d-flex align-items-center">
                                <label>Show:</label>
                                <select class="sorter wide" style="display: none;">
                                    <option value="12">12</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="75">75</option>
                                    <option value="100">100</option>
                                </select><div class="nice-select sorter wide" tabindex="0"><span class="current">12</span><ul class="list"><li data-value="12" class="option selected">12</li><li data-value="25" class="option">25</li><li data-value="50" class="option">50</li><li data-value="75" class="option">75</li><li data-value="100" class="option">100</li></ul></div>
                            </div>
                        </div>
                        <!-- Toolbar Short Area End -->
                    </div>
                    <!-- Grid & List View End -->
                    <div class="main-categorie mb-all-40">
                        <!-- Grid & List Main Area End -->
                        <div class="tab-content fix">
                            <div id="grid-view" class="tab-pane fade show active">
                                <div class="row">
                                    @if($results)
                                        @foreach($results as $item)
                                            @php
                                                $name = $item['name'];
                                                $url_key = $item['url_key'];
                                                $price = $item['price'];
                                                $cost = $item['cost'];

                                                $image = $productImageHelper->getProductBaseImage($item->product);
                                                $images = $productImageHelper->getGalleryImages($item->product);

                                                $discount = 0;
                                                if($cost > 0) {
                                                    $discount = (($price - $cost)/$price)*100;
                                                }
                                            @endphp
                                    <!-- Single Product Start -->
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="{{ route('shop.products.index', $url_key) }}">
                                                    <img class="primary-img" src="{{ $image['medium_image_url'] }}" alt="{{$name}}">
                                                    @if(count($images) >= 2)
                                                        @foreach($images as $keyImage => $valImage)
                                                            @if($keyImage == 1)
                                                                <img class="secondary-img" src="{{ $valImage['medium_image_url'] }}" alt="{{$name}}">
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </a>
                                                <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="" data-original-title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <div class="pro-info">
                                                    <h4>
                                                        <a href="{{ route('shop.products.index', $url_key) }}">
                                                            {{$name}}
                                                        </a>
                                                    </h4>
                                                    <p>
                                                        @if($cost > 0)
                                                            <del class="prev-price">{{ number_format($price) }} đ</del>
                                                            <span class="price">{{ number_format($cost) }} đ</span>
                                                        @endif
                                                        @if($cost == 0)
                                                            <span class="price">{{ number_format($price) }} đ</span>
                                                        @endif
                                                    </p>
                                                    @if($discount > 0)
                                                        <div class="label-product l_sale">
                                                            {{ round($discount) }}
                                                            <span class="symbol-percent">%</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <form method="POST" id="product-form" action="{{ route('cart.add', $item['id']) }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" id="selected_configurable_option" name="selected_configurable_option" value="{{$item['id']}}">
                                                    <div class="pro-actions">
                                                        <input class="quantity mr-15" name="quantity" type="hidden" value="1">
                                                        <div class="actions-primary">
                                                            <button type="submit"> + Add To Cart</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                        @endforeach
                                    @endif
                                </div>
                                <!-- Row End -->
                            </div>
                            <!-- #grid view End -->
                            <div id="list-view" class="tab-pane fade">
                            @if($results)
                                @foreach($results as $item)
                                    @php
                                        $name = $item['name'];
                                        $url_key = $item['url_key'];
                                        $price = $item['price'];
                                        $cost = $item['cost'];
                                        $new = $item['new'];
                                        $short_description = $item['short_description'];

                                        $image = $productImageHelper->getProductBaseImage($item->product);
                                        $images = $productImageHelper->getGalleryImages($item->product);

                                        $discount = 0;
                                        if($cost > 0) {
                                            $discount = (($price - $cost)/$price)*100;
                                        }
                                    @endphp
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <div class="row">
                                        <!-- Product Image Start -->
                                        <div class="col-lg-4 col-md-5 col-sm-12">
                                            <div class="pro-img">
                                                <a href="{{ route('shop.products.index', $url_key) }}">
                                                    <img class="primary-img" src="{{ $image['medium_image_url'] }}" alt="{{$name}}">
                                                    @if(count($images) >= 2)
                                                        @foreach($images as $keyImage => $valImage)
                                                            @if($keyImage == 1)
                                                                <img class="secondary-img" src="{{ $valImage['medium_image_url'] }}" alt="{{$name}}">
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </a>
                                                <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="" data-original-title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                                @if($new)
                                                <span class="sticker-new">new</span>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="col-lg-8 col-md-7 col-sm-12">
                                            <div class="pro-content hot-product2">
                                                <h4>
                                                    <a href="{{ route('shop.products.index', $url_key) }}">
                                                        {{$name}}
                                                    </a>
                                                </h4>
                                                <p>
                                                    @if($cost > 0)
                                                        <del class="prev-price">{{ number_format($price) }} đ</del>
                                                        <span class="price">{{ number_format($cost) }} đ</span>
                                                    @endif
                                                    @if($cost == 0)
                                                        <span class="price">{{ number_format($price) }} đ</span>
                                                    @endif
                                                </p>
                                                <p>{!! $short_description !!}</p>
                                                @if($discount > 0)
                                                    <div class="label-product l_sale">
                                                        {{ round($discount) }}
                                                        <span class="symbol-percent">%</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                @endforeach
                            @endif
                            </div>
                            <!-- #list view End -->
                            <div class="pro-pagination">
                                <ul class="blog-pagination">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                                <div class="product-pagination">
                                    <span class="grid-item-list">Showing 1 to 12 of 51 (5 Pages)</span>
                                </div>
                            </div>
                            <!-- Product Pagination Info -->
                        </div>
                        <!-- Grid & List Main Area End -->
                    </div>
                </div>
                <!-- product Categorie List End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
@endsection