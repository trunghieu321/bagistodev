@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
<div class="container">
    <!-- Product Title Start -->
    <div class="post-title pb-30">
        <h2>Feature product</h2>
    </div>
    <!-- Product Title End -->
    <!-- Hot Deal Product Activation Start -->
    <div class="hot-deal-active owl-carousel">
    @if(!empty($products))
        @foreach($products as $key => $item)
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
                <div class="single-product">
                    <!-- Product Image Start -->
                    <div class="pro-img">
                        <a href="{{ route('shop.products.index', $url_key) }}">
                            <img class="primary-img" src="{{ $image['medium_image_url'] }}" alt="single-product">
                            @if(count($images) == 2)
                                @foreach($images as $keyImage => $valImage)
                                    @if($keyImage == 1)
                                        <img class="secondary-img" src="{{ $valImage['medium_image_url'] }}" alt="single-product">
                                    @endif
                                @endforeach
                            @endif
                        </a>
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
                <!-- Single Product End -->
            @endforeach
        @endif
    </div>
    <!-- Hot Deal Product Active End -->

</div>
<!-- Container End -->
