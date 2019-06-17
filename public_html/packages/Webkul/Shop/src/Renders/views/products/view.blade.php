@extends('shop::layouts.app')

@section('content')
    @inject ('configurableOptionHelper', 'Webkul\Product\Helpers\ConfigurableOption')
    @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
    @php
        $pro_flat_name = $product['name'];
        $pro_flat_url_key = $product['url_key'];
        $pro_flat_price = $product['price'];
        $pro_flat_cost = $product['cost'];
        $pro_flat_type = $product['type'];
        $pro_flat_short_desc = $product['short_description'];
        $pro_flat_description = $product['description'];
        $discount = 0;
        if($pro_flat_cost > 0) {
            $discount = (($pro_flat_price - $pro_flat_cost)/$pro_flat_price)*100;
        }
        $config = $configurableOptionHelper->getConfigurationConfig($product);
        $images = $productImageHelper->getGalleryImages($product);
    @endphp
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="{{route('shop.home.index')}}">Home</a></li>
                    <li><a>Product</a></li>
                    <li class="active"><a href="{{route('shop.products.index', $pro_flat_url_key)}}">{{ $pro_flat_name }}</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- Product Thumbnail Start -->
    <product-view inline-template>
        <div class="main-product-thumbnail ptb-sm-60">
            <div class="container">
                <div class="thumb-bg">
                    <div class="row">
                        <!-- Main Thumbnail Image Start -->
                        @include('shop::products.view.gallery', ['product', $product])
                        <!-- Main Thumbnail Image End -->
                        <!-- Thumbnail Description Start -->
                        <div class="col-lg-7">
                            <div class="thubnail-desc fix">
                                <h3 class="product-header">@{{ product.name }}</h3>
                                @include('shop::products.view.rating', ['product' => $product])
                                @include('shop::products.view.price', ['product' => $product])
                                @include('shop::products.view.short-desc', ['product' => $product])
                                @include('shop::products.view.choose-option', ['product' => $product])
                                @include('shop::products.view.pro-actions', ['product', $product])
                                @include('shop::products.view.in-stock', ['product', $product])
                                @include('shop::products.view.social')
                            </div>
                        </div>
                        <!-- Thumbnail Description End -->
                    </div>
                    <!-- Row End -->
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Product Thumbnail End -->
    </product-view>
    <!-- Product Thumbnail Description Start -->
    <div class="thumnail-desc pb-100 pb-sm-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="main-thumb-desc nav tabs-area" role="tablist">
                        <li><a class="active" data-toggle="tab" href="#dtail">Product Details</a></li>
                        <li><a data-toggle="tab" href="#review">Reviews 1</a></li>
                    </ul>
                    <!-- Product Thumbnail Tab Content Start -->
                    <div class="tab-content thumb-content border-default">
                        @include('shop::products.view.desc', ['product', $product])
                        @include('shop::products.view.review', ['product' => $product])
                    </div>
                    <!-- Product Thumbnail Tab Content End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Product Thumbnail Description End -->
    @include('shop::products.view.related-products', ['product' => $product])
@endsection

@push('footer_js')
    <script type="text/javascript">
        var name = @json($pro_flat_name);
        var price = @json($pro_flat_price);
        var cost = @json($pro_flat_cost);
        var discount = @json($discount);
        var config = @json($config);
        var galleryImages = @json($images);
        console.log(config);
    </script>
@endpush
