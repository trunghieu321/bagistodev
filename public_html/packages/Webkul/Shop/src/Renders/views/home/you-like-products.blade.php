<div class="like-product-area">
    <h2 class="section-ttitle2 mb-30">You May Like </h2>
    <!-- Arrivals Product Activation Start Here -->
    <div class="like-pro-active owl-carousel">
        @if(!empty($products['categories']))
            @php $tmp = 0; @endphp
            @foreach($products['categories'] as $keyCategory => $valCategory)
                @if(!empty($valCategory['products'.$tmp]))
                    <!-- Double Product Start -->
                        <div class="double-product">
                        @if(!empty($valCategory['products'.$tmp][0]))
                            @php
                                $pro_flat_name0 = $valCategory['products'.$tmp][0]['pro_flat_name'];
                                $pro_flat_url_key0 = $valCategory['products'.$tmp][0]['pro_flat_url_key'];
                                $pro_flat_price0 = $valCategory['products'.$tmp][0]['pro_flat_price'];
                                $pro_flat_cost0 = $valCategory['products'.$tmp][0]['pro_flat_cost'];
                                $discount0 = 0;
                                if($pro_flat_cost0 > 0) {
                                    $discount0 = (($pro_flat_price0 - $pro_flat_cost0)/$pro_flat_price0)*100;
                                }
                            @endphp
                            <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{ route('shop.products.index', $pro_flat_url_key0) }}">
                                            @if(!empty($valCategory['products'.$tmp][0]['product_images'][0]))
                                                <img class="primary-img" src="{{asset("storage/".$valCategory['products'.$tmp][0]['product_images'][0]['pro_img_path'])}}" alt="single-product">
                                            @endif
                                            @if(!empty($valCategory['products'.$tmp][0]['product_images'][1]))
                                                <img class="secondary-img" src="{{asset("storage/".$valCategory['products'.$tmp][0]['product_images'][1]['pro_img_path'])}}" alt="single-product">
                                            @endif
                                        </a>
                                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{ route('shop.products.index', $pro_flat_url_key0) }}">{{$pro_flat_name0}}</a></h4>
                                            <p>
                                                @if($pro_flat_cost0 > 0)
                                                <del class="prev-price">{{ number_format($pro_flat_price0) }}</del>
                                                <span class="price">{{ number_format($pro_flat_cost0) }}</span>
                                                @endif
                                                @if($pro_flat_cost0 == 0)
                                                <span class="price">{{ number_format($pro_flat_price0) }}</span>
                                                @endif
                                            </p>
                                            @if($discount0 > 0)
                                            <div class="label-product l_sale">
                                                {{round($discount0)}}
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
                        @endif

                        @if(!empty($valCategory['products'.$tmp][1]))
                            @php
                                $pro_flat_name1 = $valCategory['products'.$tmp][1]['pro_flat_name'];
                                $pro_flat_url_key1 = $valCategory['products'.$tmp][1]['pro_flat_url_key'];
                                $pro_flat_price1 = $valCategory['products'.$tmp][1]['pro_flat_price'];
                                $pro_flat_cost1 = $valCategory['products'.$tmp][1]['pro_flat_cost'];
                                $discount1 = 0;
                                if($pro_flat_cost1 > 0) {
                                    $discount1 = (($pro_flat_price1 - $pro_flat_cost1)/$pro_flat_price1)*100;
                                }
                            @endphp
                            <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{ route('shop.products.index', $pro_flat_url_key1) }}">
                                            @if(!empty($valCategory['products'.$tmp][1]['product_images'][0]))
                                                <img class="primary-img" src="{{asset("storage/".$valCategory['products'.$tmp][0]['product_images'][0]['pro_img_path'])}}" alt="single-product">
                                            @endif
                                            @if(!empty($valCategory['products'.$tmp][1]['product_images'][1]))
                                                <img class="secondary-img" src="{{asset("storage/".$valCategory['products'.$tmp][0]['product_images'][1]['pro_img_path'])}}" alt="single-product">
                                            @endif
                                        </a>
                                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{ route('shop.products.index', $pro_flat_url_key1) }}">{{$pro_flat_name1}}</a></h4>
                                            <p>
                                                @if($pro_flat_cost1 > 0)
                                                <del class="prev-price">{{ number_format($pro_flat_price1) }}</del>
                                                <span class="price">{{ number_format($pro_flat_cost1) }}</span>
                                                @endif
                                                @if($pro_flat_cost1 == 0)
                                                <span class="price">{{ number_format($pro_flat_price1) }}</span>
                                                @endif
                                            </p>
                                            @if($discount1 > 0)
                                                <div class="label-product l_sale">
                                                    {{round($discount1)}}
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
                            @endif

                        </div>
                    @php $tmp++; @endphp
                @endif
            @endforeach
        @endif
    </div>
    <!-- Arrivals Product Activation End Here -->
</div>
<!-- main-product-tab-area-->