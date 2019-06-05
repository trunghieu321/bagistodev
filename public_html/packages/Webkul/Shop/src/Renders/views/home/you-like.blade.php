<div class="like-product-area">
    <h2 class="section-ttitle2 mb-30">You May Like </h2>
    <!-- Arrivals Product Activation Start Here -->
    <div class="like-pro-active owl-carousel">
        @if(!empty($newProducts['categories']))
            @php $tmp = 0; @endphp
            @foreach($newProducts['categories'] as $keyCategory => $valCategory)
                    @if(!empty($valCategory['products'.$tmp]))
                        @while(isset($valCategory['products'.$tmp]))
                            <!-- Double Product Start -->
                                <div class="double-product">
                                @if(!empty($valCategory['products'.$tmp][0]))
                                    <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    @if(!empty($valCategory['products'.$tmp][0]['product_images'][0]))
                                                        <img class="primary-img" src="{{asset("storage/".$valCategory['products'.$tmp][0]['product_images'][0]['product_image_path'])}}" alt="single-product">
                                                    @endif
                                                    @if(!empty($valCategory['products'.$tmp][0]['product_images'][1]))
                                                        <img class="secondary-img" src="{{asset("storage/".$valCategory['products'.$tmp][0]['product_images'][1]['product_image_path'])}}" alt="single-product">
                                                    @endif
                                                </a>
                                                <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <div class="pro-info">
                                                    <h4><a href="product.html">{{$valCategory['products'.$tmp][0]['product_name']}}</a></h4>
                                                    <p><span class="price">{{$valCategory['products'.$tmp][0]['product_cost_price']}}</span><del class="prev-price">{{$valCategory['products'.$tmp][0]['product_price']}}</del></p>
                                                    <div class="label-product l_sale">{{$valCategory['products'.$tmp][0]['product_price'] - $valCategory['products'.$tmp][0]['product_cost_price']}}<span class="symbol-percent">%</span></div>
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
                                    <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    @if(!empty($valCategory['products'.$tmp][1]['product_images'][0]))
                                                        <img class="primary-img" src="{{asset("storage/".$valCategory['products'.$tmp][1]['product_images'][0]['product_image_path'])}}" alt="single-product">
                                                    @endif
                                                    @if(!empty($valCategory['products'.$tmp][1]['product_images'][1]))
                                                        <img class="secondary-img" src="{{asset("storage/".$valCategory['products'.$tmp][1]['product_images'][1]['product_image_path'])}}" alt="single-product">
                                                    @endif
                                                </a>
                                                <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <div class="pro-info">
                                                    <h4><a href="product.html">{{$valCategory['products'.$tmp][1]['product_name']}}</a></h4>
                                                    <p><span class="price">{{$valCategory['products'.$tmp][1]['product_cost_price']}}</span><del class="prev-price">{{$valCategory['products'.$tmp][1]['product_price']}}</del></p>
                                                    <div class="label-product l_sale">{{$valCategory['products'.$tmp][1]['product_price'] - $valCategory['products'.$tmp][1]['product_cost_price']}}<span class="symbol-percent">%</span></div>
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
                            <!-- Double Product End -->
                            @endwhile
                        @endif
            @endforeach
        @endif
    </div>
    <!-- Arrivals Product Activation End Here -->
</div>
<!-- main-product-tab-area-->