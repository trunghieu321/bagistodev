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
                    @php
                        if($i == 0) { $active = "active"; } elseif($i > 0) { $active = "";}
                        $category_slug = $valCategory['cate_trans_slug'].$tmp;
                        $category_name = $valCategory['cate_trans_name'];
                    @endphp
                    <li class="nav-item">
                        <a class="nav-link {{$active}}" data-toggle="tab" href="#{{$category_slug}}">{{$category_name}} </a>
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
                @php
                    if($i == 0){
                        $active = "active"; $show = "show";
                    } else if($i > 0) {
                        $active = ""; $show = "";
                    }
                    $category_slug = $valCategory['cate_trans_slug'].$tmp;
                @endphp
                <div id="{{ $category_slug }}" class="tab-pane fade {{$show}} {{$active}}">
                    <!-- Arrivals Product Activation Start Here -->
                    <div class="best-seller-pro-active owl-carousel">
                    @if(!empty($valCategory['products']))
                        @foreach($valCategory['products'] as $keyProduct => $valProduct)
                            @php
                                $pro_flat_name = $valProduct['pro_flat_name'];
                                $pro_flat_url_key = $valProduct['pro_flat_url_key'];
                                $pro_flat_price = $valProduct['pro_flat_price'];
                                $pro_flat_cost = $valProduct['pro_flat_cost'];
                                if(isset($valProduct['product_images'][0])) {
                                    $pro_img_path0 = $valProduct['product_images'][0]['pro_img_path'];
                                }

                                if(isset($valProduct['product_images'][1])) {
                                    $pro_img_path1 = $valProduct['product_images'][1]['pro_img_path'];
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
                                            @if(!empty($valProduct['product_images'][0]))
                                                <img class="primary-img" src="{{asset("storage/".$pro_img_path0)}}" alt="{{$pro_flat_name}}">
                                            @endif
                                            @if(!empty($valProduct['product_images'][1]))
                                                <img class="secondary-img" src="{{asset("storage/".$pro_img_path1)}}" alt="{{$pro_flat_name}}">
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
                                                    {{ $valProduct['pro_flat_name'] }}
                                                </a>
                                            </h4>
                                            <p>
                                                @if($pro_flat_cost > 0)
                                                <del class="prev-price">{{ number_format($pro_flat_price) }} đ</del>
                                                <span class="price">{{ number_format($pro_flat_cost) }} đ</span>
                                                @endif
                                                @if($pro_flat_cost == 0)
                                                <span class="price">{{ number_format($pro_flat_price) }} đ</span>
                                                @endif
                                            </p>
                                            @if($discount > 0)
                                            <div class="label-product l_sale">
                                                {{ round($discount) }}
                                                <span class="symbol-percent">%</span>
                                            </div>
                                            @endif
                                        </div>
                                        <form method="POST" id="product-form" action="{{ route('cart.add', $valProduct['pro_flat_id']) }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" id="selected_configurable_option" name="selected_configurable_option" value="{{$valProduct['pro_flat_id']}}">
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
                    <!-- Arrivals Product Activation End Here -->
                </div>
                @php $tmp++; $i++; @endphp
            @endforeach
        @endif
    </div>
    <!-- Tab Content End -->
</div>
<!-- main-product-tab-area-->
