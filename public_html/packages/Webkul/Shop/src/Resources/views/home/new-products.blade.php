<div class="main-product-tab-area">
    <div class="tab-menu mb-25">
        <div class="section-ttitle">
            <h2>New Arrivals</h2>
        </div>
        <!-- Nav tabs -->
        <ul class="nav tabs-area" role="tablist">
            @if(!empty($products['categories']))
                @php $i = 0; $len = count($products['categories']); @endphp
                @foreach($products['categories'] as $keyCategory => $valCategory)
                    @php
                        if($i == 0) { $active = "active"; } elseif($i > 0) { $active = "";}
                        $category_slug = $valCategory['cate_trans_slug'];
                        $category_name = $valCategory['cate_trans_name'];
                    @endphp
                    <li class="nav-item">
                        <a class="nav-link {{$active}}" data-toggle="tab" href="#{{$category_slug}}">{{$category_name}} </a>
                    </li>
                    @php $i++; @endphp
                @endforeach
            @endif
        </ul>

    </div>

    <!-- Tab Contetn Start -->
    <div class="tab-content">
        @php $products; @endphp
        @if(!empty($products['categories']))
            @php $tmp = 0; $i = 0; $len = count($products['categories']); @endphp
            @foreach($products['categories'] as $keyCategory => $valCategory)
                @php if($i == 0) { $active = "active"; $show = "show"; } elseif($i > 0) { $active = ""; $show = "";} @endphp
                <div id="{{$valCategory['cate_trans_slug']}}" class="tab-pane fade {{$show}} {{$active}}">
                    <!-- Arrivals Product Activation Start Here -->
                    <div class="electronics-pro-active owl-carousel">
                    @if(!empty($valCategory['products'.$tmp]))
                        @while(isset($valCategory['products'.$tmp]))
                            <!-- Double Product Start -->
                                <div class="double-product">
                                @if(!empty($valCategory['products'.$tmp][0]))
                                    @php
                                        $pro_flat_id0 = $valCategory['products'.$tmp][0]['pro_flat_id'];
                                        $pro_flat_name0 = $valCategory['products'.$tmp][0]['pro_flat_name'];
                                        $pro_flat_url_key0 = $valCategory['products'.$tmp][0]['pro_flat_url_key'];
                                        $pro_flat_price0 = $valCategory['products'.$tmp][0]['pro_flat_price'];
                                        $pro_flat_cost0 = $valCategory['products'.$tmp][0]['pro_flat_cost'];
                                        $pro_flat_new0 = $valCategory['products'.$tmp][0]['pro_flat_new'];
                                        $discount0 = 0;
                                        ;
                                        if(number_format($pro_flat_cost0) != 0) {
                                            $discount0 = (($pro_flat_price0 - $pro_flat_cost0)/$pro_flat_cost0)*100;
                                        }
                                    @endphp
                                    <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="{{route('shop.products.index', $pro_flat_url_key0)}}">
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
                                                    <h4><a href="{{route('shop.products.index', $pro_flat_url_key0)}}">{{$pro_flat_name0}}</a></h4>
                                                    <p>
                                                        @if($pro_flat_cost0 > 0)
                                                        <del class="prev-price">{{ number_format($pro_flat_price0) }} đ</del>
                                                        <span class="price">{{ number_format($pro_flat_cost0) }} đ</span>
                                                        @endif
                                                        @if($pro_flat_cost0 == 0)
                                                        <span class="price">{{ number_format($pro_flat_price0) }} đ</span>
                                                        @endif
                                                    </p>
                                                    @if($discount0 > 0)
                                                        <div class="label-product l_sale">{{round($discount0)}}<span class="symbol-percent">%</span></div>
                                                    @endif
                                                </div>
                                                <form method="POST" id="product-form" action="{{ route('cart.add', $pro_flat_id0) }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" id="selected_configurable_option" name="selected_configurable_option" value="{{$pro_flat_id0}}">
                                                    <div class="pro-actions">
                                                        <input class="quantity mr-15" name="quantity" type="hidden" value="1">
                                                        <div class="actions-primary">
                                                            <button type="submit"> + Add To Cart</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Product Content End -->
                                            @if($pro_flat_new0)
                                            <span class="sticker-new">new</span>
                                            @endif
                                        </div>
                                        <!-- Single Product End -->
                                @endif

                                @if(!empty($valCategory['products'.$tmp][1]))
                                    @php
                                        $pro_flat_id1 = $valCategory['products'.$tmp][1]['pro_flat_id'];
                                        $pro_flat_name1 = $valCategory['products'.$tmp][1]['pro_flat_name'];
                                        $pro_flat_url_key1 = $valCategory['products'.$tmp][1]['pro_flat_url_key'];
                                        $pro_flat_price1 = $valCategory['products'.$tmp][1]['pro_flat_price'];
                                        $pro_flat_cost1 = $valCategory['products'.$tmp][1]['pro_flat_cost'];
                                        $pro_flat_new1 = $valCategory['products'.$tmp][1]['pro_flat_new'];
                                        $discount1 = 0;
                                        if($pro_flat_cost1 > 0) {
                                            $discount1 = (($pro_flat_price1 - $pro_flat_cost1)/$pro_flat_price1)*100;
                                        }
                                    @endphp
                                    <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="{{route('shop.products.index', $pro_flat_url_key1)}}">
                                                    @if(!empty($valCategory['products'.$tmp][1]['product_images'][0]))
                                                        <img class="primary-img" src="{{asset("storage/".$valCategory['products'.$tmp][1]['product_images'][0]['pro_img_path'])}}" alt="single-product">
                                                    @endif
                                                    @if(!empty($valCategory['products'.$tmp][1]['product_images'][1]))
                                                        <img class="secondary-img" src="{{asset("storage/".$valCategory['products'.$tmp][1]['product_images'][1]['pro_img_path'])}}" alt="single-product">
                                                    @endif
                                                </a>
                                                <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <div class="pro-info">
                                                    <h4><a href="{{route('shop.products.index', $pro_flat_url_key1)}}">{{$pro_flat_name1}}</a></h4>
                                                    <p>
                                                        @if($pro_flat_cost1 > 0)
                                                        <del class="prev-price">{{ number_format($pro_flat_price1) }} đ</del>
                                                        <span class="price">{{ number_format($pro_flat_cost1) }} đ</span>
                                                        @endif
                                                        @if($pro_flat_cost1 == 0)
                                                        <span class="price">{{ number_format($pro_flat_price1) }} đ</span>
                                                        @endif
                                                    </p>
                                                    @if($discount1 > 0)
                                                    <div class="label-product l_sale">
                                                        {{round($discount1)}}
                                                        <span class="symbol-percent">%</span>
                                                    </div>
                                                    @endif
                                                </div>
                                                <form method="POST" id="product-form" action="{{ route('cart.add', $pro_flat_id1) }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" id="selected_configurable_option" name="selected_configurable_option" value="{{$pro_flat_id1}}">
                                                    <div class="pro-actions">
                                                        <input class="quantity mr-15" name="quantity" type="hidden" value="1">
                                                        <div class="actions-primary">
                                                            <button type="submit"> + Add To Cart</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Product Content End -->
                                            @if($pro_flat_new1)
                                            <span class="sticker-new">new</span>
                                            @endif
                                        </div>
                                        <!-- Single Product End -->
                                    @endif

                                </div>
                            @php $tmp++; @endphp
                            <!-- Double Product End -->
                            @endwhile
                        @endif
                    </div>
                    <!-- Arrivals Product Activation End Here -->
                </div>
                @php $i++; @endphp
            @endforeach
        @endif
    </div>
    <!-- Tab Content End -->
</div>
<!-- main-product-tab-area-->
