@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
<?php $images = $productImageHelper->getGalleryImages($product); ?>
{!! view_render_event('bagisto.shop.products.view.gallery.before', ['product' => $product]) !!}
<!-- Main Thumbnail Image Start -->
<div class="col-lg-5 mb-all-40">
    @if($images)
    <!-- Thumbnail Large Image start -->
    <div class="tab-content">
        @foreach($images as $keyImage => $valImage)
           @php $active = ""; $show = "";
                if($keyImage == 0) {
                    $active = "active";
                    $show = "show";
                }
           @endphp
        <div id="thumb0{{$keyImage}}" class="tab-pane fade {{$show}} {{$active}}">
            <a data-fancybox="images" href="{{$valImage['large_image_url']}}">
                <img src="{{$valImage['large_image_url']}}" alt="{{$product['name']}}">
            </a>
        </div>
        @endforeach
    </div>
    @endif
    <!-- Thumbnail Large Image End -->
    <!-- Thumbnail Image End -->
    @if($images)
    <div class="product-thumbnail mt-15">
        <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">
            @foreach($images as $keyImage => $valImage)
                @php $active = ""; $show = "";
                if($keyImage == 0) {
                    $active = "active";
                }
                @endphp
                <a class="{{$active}}" data-toggle="tab" v-on:click="activeImage()" href="#thumb0{{$keyImage}}">
                    <img src="{{$valImage['small_image_url']}}" alt="{{$product['name']}}">
                </a>
            @endforeach
        </div>
    </div>
    @endif
    <!-- Thumbnail image end -->
</div>
<!-- Main Thumbnail Image End -->

{!! view_render_event('bagisto.shop.products.view.gallery.after', ['product' => $product]) !!}