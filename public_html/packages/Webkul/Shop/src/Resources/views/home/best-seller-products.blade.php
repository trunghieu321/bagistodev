@inject("productRepository", "Webkul\Product\Repositories\ProductRepository")
@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
<div class="main-product-tab-area">
    <div class="tab-menu mb-25">
        <div class="section-ttitle">
            <h2>Best Seller</h2>
        </div>
        <!-- Nav tabs -->
        <ul class="nav tabs-area" role="tablist">
            @if($categories)
            @php $tmp = 0; $i = 0; $len = count($categories); @endphp
                @foreach($categories as $key => $item)
                @php
                    if($i == 0){
                        $active = "active"; $show = "show";
                    } else if($i > 0) {
                        $active = ""; $show = "";
                    }
                    $slug = $item->translations[0]['slug'];
                    $name = $item->translations[0]['name'];
                @endphp
                <li class="nav-item">
                    <a class="nav-link {{$active}}" data-toggle="tab" href="#{{$slug}}">{{$name}}</a>
                </li>
                @php
                    $i++;
                @endphp
                @endforeach
            @endif
        </ul>
    </div>

    <!-- Tab Contetn Start -->
    <div class="tab-content">
        @if($categories)
            @php $tmp = 0; $i = 0; $len = count($categories); @endphp
            @foreach($categories as $key => $item)
                @php
                    if($i == 0){
                        $active = "active"; $show = "show";
                    } else if($i > 0) {
                        $active = ""; $show = "";
                    }
                    $categoryId = $item->translations[0]['id'];
                    $slug = $item->translations[0]['slug'];
                    $products = $productRepository->getBestSellProducts($categoryId);
                @endphp
                <div id="{{ $slug }}" class="tab-pane fade {{$show}} {{$active}}">
                    <!-- Arrivals Product Activation Start Here -->
                    <div class="best-seller-pro-active owl-carousel">
                    @foreach($products as $product)
                    @php
                        $name = $product['name'];
                        $url_key = $product['url_key'];
                        $price = $product['price'];
                        $cost = $product['cost'];

                        $image = $productImageHelper->getProductBaseImage($product->product);
                        $images = $productImageHelper->getGalleryImages($product->product);

                        $discount = 0;
                        if($cost > 0) {
                            $discount = (($price - $cost)/$price)*100;
                        }
                    @endphp
                    <!-- Single Product Start -->
                        <div class="single-product">
                            <!-- Product Image Start -->
                            <div class="pro-img">
                                <a href="{{ route('shop.products.index', $url_key) }}">
                                    <img class="primary-img" src="{{ $image['medium_image_url'] }}" alt="single-product">
                                    @if(count($images) >= 2)
                                        @foreach($images as $keyImage => $valImage)
                                            @if($keyImage == 1)
                                                <img class="secondary-img" src="{{ $valImage['medium_image_url'] }}" alt="single-product">
                                            @endif
                                        @endforeach
                                    @endif
                                </a>
                                <div class="countdown" data-countdown="2020/03/01"></div>
                                <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
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
                                <form method="POST" id="product-form" action="{{ route('cart.add', $product['id']) }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" id="selected_configurable_option" name="selected_configurable_option" value="{{$product['id']}}">
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
                        <!-- Single Product End -->
                    </div>
                    <!-- Arrivals Product Activation End Here -->
                    @endforeach
                </div>
                @php
                    $i++;
                @endphp
            @endforeach
        @endif
    </div>
    <!-- Tab Content End -->
</div>
<!-- main-product-tab-area-->
