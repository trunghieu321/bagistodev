<div class="col-lg-5 mb-all-40">
    <!-- Thumbnail Large Image start -->
    <div class="tab-content">
        <div v-for="(image, index) in galleryImages"
            :id="'thumb'+index"
            :class="[(index == 0 ) ? 'tab-pane fade show active' : 'tab-pane fade']">
            <a data-fancybox="images" :href="image.large_image_url">
                <img :src="image.large_image_url" alt="product-view">
            </a>
        </div>
    </div>
    <!-- Thumbnail Large Image End -->
    <!-- Thumbnail Image End -->
    <div class="product-thumbnail mt-15">
        <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">
            <a  v-for="(image, index) in galleryImages"
                :class="[(index == 0) ? 'active' : '']"
                data-toggle="tab"
                :href="'#thumb'+index">
                <img :src="image.small_image_url" alt="product-thumbnail">
            </a>
        </div>
    </div>
    <!-- Thumbnail image end -->
</div>
<!-- Main Thumbnail Image End -->