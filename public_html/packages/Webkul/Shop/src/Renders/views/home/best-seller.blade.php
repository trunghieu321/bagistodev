<div class="main-product-tab-area">
    <div class="tab-menu mb-25">
        <div class="section-ttitle">
            <h2>Best Seller</h2>
        </div>
        <!-- Nav tabs -->
        <ul class="nav tabs-area" role="tablist">
            @if(!empty($products['categories']))
                @php $tmp = 0; $i = 0; $len = count($products['categories']); @endphp
                @foreach($products['categories'] as $keyCategory => $valCategory)
                    @php if($i == 0) { $active = "active"; } elseif($i > 0) { $active = "";} @endphp
                    <li class="nav-item">
                        <a class="nav-link {{$active}}" data-toggle="tab" href="#{{$valCategory['cate_trans_slug'].$tmp}}">{{$valCategory['cate_trans_name']}} </a>
                    </li>
                    @php $i++; $tmp++; @endphp
                @endforeach
            @endif
        </ul>

    </div>

    <!-- Tab Contetn Start -->
    <div class="tab-content">
        @if(!empty($products['categories']))
            @php $tmp = 0; $i = 0; $len = count($products['categories']); @endphp
            @foreach($products['categories'] as $keyCategory => $valCategory)
                @php if($i == 0) { $active = "active"; $show = "show"; } else if($i > 0) {$active = ""; $show = "";} @endphp
                <div id="{{$valCategory['cate_trans_slug'].$tmp}}" class="tab-pane fade {{$show}} {{$active}}">
                    <!-- Arrivals Product Activation Start Here -->
                    <div class="best-seller-pro-active owl-carousel">
                    @if(!empty($valCategory['products']))
                        @foreach($valCategory['products'] as $keyProduct => $valProduct)
                            <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            @if(!empty($valProduct['product_images'][0]))
                                                <img class="primary-img" src="{{asset("storage/".$valProduct['product_images'][0]['pro_img_path'])}}" alt="{{$valProduct['pro_flat_name']}}">
                                            @endif
                                            @if(!empty($valProduct['product_images'][1]))
                                                <img class="secondary-img" src="{{asset("storage/".$valProduct['product_images'][1]['pro_img_path'])}}" alt="{{$valProduct['pro_flat_name']}}">
                                            @endif
                                        </a>
                                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="product.html">{{$valProduct['pro_flat_name']}}</a></h4>
                                            <p><span class="price">{{number_format($valProduct['pro_flat_price'])}}</span></p>
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
                    <!-- Arrivals Product Activation End Here -->
                </div>
                @php $tmp++; $i++; @endphp
            @endforeach
        @endif
    </div>
    <!-- Tab Content End -->
</div>
<!-- main-product-tab-area-->