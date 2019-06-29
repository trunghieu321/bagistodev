{!! view_render_event('bagisto.shop.products.view.related-products.before', ['product' => $product]) !!}
@if ($product->related_products()->count())
<!-- Realted Products Start Here -->
<div class="hot-deal-products off-white-bg pt-100 pb-90 pt-sm-60 pb-sm-50">
    <div class="container">
        <!-- Product Title Start -->
        <div class="post-title pb-30">
            <h2>Realted Products</h2>
        </div>
        <!-- Product Title End -->
        <!-- Hot Deal Product Activation Start -->
        <div class="hot-deal-active owl-carousel">
        @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
            @foreach ($product->related_products()->paginate(4) as $related_product)
                @php
                    $pro_flat_name = $related_product['name'];
                    $pro_flat_sku = $related_product['sku'];
                    $pro_flat_url_key = $related_product['url_key'];
                    $pro_flat_price = number_format($related_product['price']);
                    $pro_flat_cost = number_format($related_product['cost']);
                    $productBaseImage = $productImageHelper->getGalleryImages($product);
                    $discount = 0;
                    if($pro_flat_cost > 0) {
                        $discount = round(number_format(($related_product['cost'] - $related_product['price'])/($related_product['cost']*100)));
                    }
                @endphp
                <!-- Single Product Start -->
                <div class="single-product">
                        @if(count($productBaseImage))
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="{{ route('shop.products.index', $pro_flat_url_key) }}">
                                @php $i = 0; $len = count($productBaseImage); @endphp
                                @foreach($productBaseImage as $keyImg => $valImg)
                                    @if($i == 0)
                                <img class="primary-img" src="{{asset($valImg['large_image_url'])}}" alt="{{$pro_flat_name}}">
                                    @elseif($i == 1)
                                <img class="secondary-img" src="{{asset($valImg['large_image_url'])}}" alt="{{$pro_flat_name}}">
                                    @endif
                                    @php $i++; @endphp
                                @endforeach
                            </a>
                            <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                        </div>
                        @endif
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <div class="pro-info">
                                <h4><a href="{{ route('shop.products.index', $pro_flat_url_key) }}">{{$pro_flat_name}}</a></h4>
                                <p>
                                    @if($pro_flat_cost > 0)
                                        <span class="price">{{$pro_flat_cost}} đ</span>

                                        <del class="prev-price">{{$pro_flat_price}} đ</del>
                                    @else
                                        <span class="price">{{$pro_flat_price}} đ</span>
                                    @endif
                                </p>
                                @if($discount > 0)
                                    <div class="label-product l_sale">
                                        {{ $discount }}
                                        <span class="symbol-percent">%</span>
                                    </div>
                                @endif
                            </div>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                </div>
                                <div class="actions-secondary">
                                    <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                    <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                        <span class="sticker-new">new</span>
                    </div>
                <!-- Single Product End -->
            @endforeach

        </div>
        <!-- Hot Deal Product Active End -->

    </div>
    <!-- Container End -->
</div>
<!-- Realated Products End Here -->
@endif
{!! view_render_event('bagisto.shop.products.view.related-products.after', ['product' => $product]) !!}