<div class="container">
    <!-- Product Title Start -->
    <div class="post-title pb-30">
        <h2>hot deals</h2>
    </div>
    <!-- Product Title End -->
    <!-- Hot Deal Product Activation Start -->
    <div class="hot-deal-active owl-carousel">
    @if(!empty($dealProducts))
        @foreach($dealProducts as $keyProduct => $valProduct)
            @php $discount = $valProduct['product_price'] - $valProduct['product_cost_price']; @endphp
            <!-- Single Product Start -->
                <div class="single-product">
                    <!-- Product Image Start -->
                    <div class="pro-img">
                        <a href="product.html">
                            @if(!empty($valProduct['product_images'][0]['product_image_path']))
                                <img class="primary-img" src="{{asset("storage/".$valProduct['product_images'][0]['product_image_path'])}}" alt="{{$valProduct['product_name']}}">
                            @endif
                            @if(!empty($valProduct['product_images'][1]['product_image_path']))
                                <img class="secondary-img" src="{{asset("storage/".$valProduct['product_images'][1]['product_image_path'])}}" alt="{{$valProduct['product_name']}}">
                            @endif
                        </a>
                        <div class="countdown" data-countdown="2020/03/01"></div>
                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                    </div>
                    <!-- Product Image End -->
                    <!-- Product Content Start -->
                    <div class="pro-content">
                        <div class="pro-info">
                            <h4><a href="product.html">{{$valProduct['product_name']}}</a></h4>
                            <p><span class="price">{{$valProduct['product_cost_price']}} đ</span><del class="prev-price">{{$valProduct['product_price']}} đ</del></p>
                            <div class="label-product l_sale">{{$discount}}<span class="symbol-percent">%</span></div>
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