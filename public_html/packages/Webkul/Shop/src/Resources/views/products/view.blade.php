@extends('shop::layouts.app')

@section('content')
    @inject ('configurableOptionHelper', 'Webkul\Product\Helpers\ConfigurableOption')
    @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
    @php
        $routeName = "shop.products.index";
        $key = $product['url_key'];
        $config = $configurableOptionHelper->getConfigurationConfig($product);
        $images = $productImageHelper->getGalleryImages($product);
        $routeName = "shop.products.index";
        $lastLi = "Product";
        $nextLi = $key;
    @endphp
    @include('shop::layouts.partials.breadcrumb', [ 'routeName' => $routeName,
                                                    'key' => $key,
                                                    'lastLi' => $lastLi,
                                                    'nextLi' => $nextLi
                                                    ])
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
                                <h4 class="product-header">@{{ product.name }}</h4>
                                @include('shop::products.view.rating', ['product' => $product])
                                <ul class="list-unstyled">
                                    <li>
                                        Brands: <a><span class="ex-text">Boconi</span></a>
                                    </li>
                                    <li>SKU: <span class="ex-text">@{{product.sku}}</span></li>
					            </ul>
                                @include('shop::products.view.price', ['product' => $product])
                                @include('shop::products.view.short-desc', ['product' => $product])
                                @include('shop::products.view.choose-option', ['product' => $product])
                                @include('shop::products.view.pro-actions')
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
        var id = @json($product['id']);
        var type = @json($product['type']);
        var config = @json($config);
        var galleryImages = @json($images);
    </script>
    <script src="{{asset("themes/truemart/assets")}}/js/app.js"></script>
@endpush
