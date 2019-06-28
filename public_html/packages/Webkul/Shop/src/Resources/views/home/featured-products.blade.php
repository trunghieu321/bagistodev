<div class="container">
    <!-- Product Title Start -->
    <div class="post-title pb-30">
        <h2>Feature product</h2>
    </div>
    <!-- Product Title End -->
    <!-- Hot Deal Product Activation Start -->
    <div class="hot-deal-active owl-carousel">

    @if(!empty($products))
        @foreach($products['products'] as $keyProduct => $valProduct)
            @php
                $pro_flat_name = $valProduct['pro_flat_name'];
                $pro_flat_url_key = $valProduct['pro_flat_url_key'];
                $pro_flat_price = $valProduct['pro_flat_price'];
                $pro_flat_cost = $valProduct['pro_flat_cost'];

                if(isset($valProduct['product_images'][0])) {
                    $pro_image_path0 = $valProduct['product_images'][0]['pro_img_path'];
                }
                
                if(isset($valProduct['product_images'][1])) {
                    $pro_image_path1 = $valProduct['product_images'][1]['pro_img_path'];
                }
                
                $discount = 0;
                if($pro_flat_cost > 0) {
                    $discount = (($pro_flat_price - $pro_flat_cost)/$pro_flat_price)*100;
                }
            @endphp
            <!-- Single Product Start -->
                <div class="single-product">
                    <!-- Product Image Start -->
                    <div class="pro-img">
                        <a href="{{ route('shop.products.index', $pro_flat_url_key) }}">
                            @if(!empty($pro_image_path0))
                                <img class="primary-img" src="{{asset("storage/".$pro_image_path0)}}" alt="{{$pro_flat_name}}">
                            @endif
                            @if(!empty($pro_image_path1))
                                <img class="secondary-img" src="{{asset("storage/".$pro_image_path1)}}" alt="{{$pro_flat_name}}">
                            @endif
                        </a>
                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                    </div>
                    <!-- Product Image End -->
                    <!-- Product Content Start -->
                    <div class="pro-content">
                        <div class="pro-info">
                            <h4>
                                <a href="{{ route('shop.products.index', $pro_flat_url_key) }}">
                                    {{$pro_flat_name}}
                                </a>
                            </h4>
                            <p>
                                @if($pro_flat_cost > 0)
                                <del class="prev-price">{{ number_format($pro_flat_price) }}</del>
                                <span class="price">{{ number_format($pro_flat_cost) }}</span>
                                @endif
                                @if($pro_flat_cost == 0)
                                <span class="price">{{ number_format($pro_flat_price) }}</span>
                                @endif
                            </p>
                            @if($discount > 0)
                                <div class="label-product l_sale">
                                    {{ round($discount) }}
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
                </div>
                <!-- Single Product End -->
            @endforeach
        @endif
    </div>
    <!-- Hot Deal Product Active End -->

</div>
<!-- Container End -->