@extends('shop::layouts.app')

@section('content')
    @inject ('configurableOptionHelper', 'Webkul\Product\Helpers\ConfigurableOption')
    @php
        $pro_flat_name = $product['name'];
        $pro_flat_url_key = $product['url_key'];
        $config = $configurableOptionHelper->getConfigurationConfig($product);
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
    <div class="main-product-thumbnail ptb-sm-60">
        <div class="container">
            <product-view>
                <div class="thumb-bg">
                    <div class="row">
                        <!-- Main Thumbnail Image Start -->
                        @include('shop::products.view.gallery', ['product', $product])
                        <!-- Main Thumbnail Image End -->
                        <!-- Thumbnail Description Start -->
                        <div class="col-lg-7">
                            <div class="thubnail-desc fix">
                                <h3 class="product-header">{{$pro_flat_name}}</h3>
                                @include('shop::products.view.rating', ['product' => $product])
                                @include('shop::products.view.price', ['product' => $product])
                                @include('shop::products.view.short-desc', ['product' => $product])
                                @include('shop::products.view.option-size', ['product' => $product])
                                @include('shop::products.view.pro-actions', ['product', $product])
                                @include('shop::products.view.in-stock', ['product', $product])
                                @include('shop::products.view.social')
                            </div>
                        </div>
                        <!-- Thumbnail Description End -->
                    </div>
                    <!-- Row End -->
                </div>
            </product-view>
        </div>
        <!-- Container End -->
    </div>
    <!-- Product Thumbnail End -->
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


@push('head_css')
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset("vendor/truemart")}}/img/favicon.ico">
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/font-awesome.min.css">
    <!-- Ionicons css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/ionicons.min.css">
    <!-- linearicons css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/linearicons.css">
    <!-- Nice select css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/nice-select.css">
    <!-- Jquery fancybox css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/jquery.fancybox.css">
    <!-- Jquery ui price slider css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/jquery-ui.min.css">
    <!-- Meanmenu css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/meanmenu.min.css">
    <!-- Nivo slider css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/nivo-slider.css">
    <!-- Owl carousel css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/owl.carousel.min.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/bootstrap.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/default.css">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset("vendor/truemart")}}/css/responsive.css">

    <!-- Modernizer js -->
    <script src="{{asset("vendor/truemart")}}/js/vendor/modernizr-3.5.0.min.js"></script>
@endpush

@push('footer_js')
    <!-- jquery 3.2.1 -->
    <script src="{{asset("vendor/truemart")}}/js/vendor/jquery-3.2.1.min.js"></script>
    <script src="{{asset("vendor/truemart")}}/js/vendor/vue.js"></script>
    <!-- Countdown js -->
    <script src="{{asset("vendor/truemart")}}/js/jquery.countdown.min.js"></script>
    <!-- Mobile menu js -->
    <script src="{{asset("vendor/truemart")}}/js/jquery.meanmenu.min.js"></script>
    <!-- ScrollUp js -->
    <script src="{{asset("vendor/truemart")}}/js/jquery.scrollUp.js"></script>
    <!-- Nivo slider js -->
    <script src="{{asset("vendor/truemart")}}/js/jquery.nivo.slider.js"></script>
    <!-- Fancybox js -->
    <script src="{{asset("vendor/truemart")}}/js/jquery.fancybox.min.js"></script>
    <!-- Jquery nice select js -->
    <script src="{{asset("vendor/truemart")}}/js/jquery.nice-select.min.js"></script>
    <!-- Jquery ui price slider js -->
    <script src="{{asset("vendor/truemart")}}/js/jquery-ui.min.js"></script>
    <!-- Owl carousel -->
    <script src="{{asset("vendor/truemart")}}/js/owl.carousel.min.js"></script>
    <!-- Bootstrap popper js -->
    <script src="{{asset("vendor/truemart")}}/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{asset("vendor/truemart")}}/js/bootstrap.min.js"></script>
    <!-- Plugin js -->
    <script src="{{asset("vendor/truemart")}}/js/plugins.js"></script>
    <!-- Main activaion js -->
    <script src="{{asset("vendor/truemart")}}/js/main.js"></script>
    <script>

        Vue.component('product-view', {

            template: '#product-view-template',

            inject: ['$validator'],


            data: () => ({
                config: @json($config),

                childAttributes: [],

                selectedProductId: '',

                simpleProduct: null,

                galleryImages: []
            }),

            created () {
                this.galleryImages = galleryImages.slice(0);
                console.log(this.galleryImages);

                var config = @json($config);
                alert(config);

                var childAttributes = this.childAttributes,
                    attributes = config.attributes.slice(),
                    index = attributes.length,
                    attribute;

                while (index--) {
                    attribute = attributes[index];

                    attribute.options = [];

                    if (index) {
                        attribute.disabled = true;
                    } else {
                        this.fillSelect(attribute);
                    }

                    attribute = Object.assign(attribute, {
                        childAttributes: childAttributes.slice(),
                        prevAttribute: attributes[index - 1],
                        nextAttribute: attributes[index + 1]
                    });

                    childAttributes.unshift(attribute);
                }
            },

            methods: {
                configure (attribute, value) {
                    this.simpleProduct = this.getSelectedProductId(attribute, value);

                    if (value) {
                        attribute.selectedIndex = this.getSelectedIndex(attribute, value);

                        if (attribute.nextAttribute) {
                            attribute.nextAttribute.disabled = false;

                            this.fillSelect(attribute.nextAttribute);

                            this.resetChildren(attribute.nextAttribute);
                        } else {
                            this.selectedProductId = attribute.options[attribute.selectedIndex].allowedProducts[0];
                        }

                        //buy now anchor href changer with options
                        var buyNowLink = $('.btn.buynow').attr('data-href');

                        if (this.selectedProductId != '') {
                            var splitted = buyNowLink.split("/");

                            var lastItem = splitted.pop();

                            lastItem = this.selectedProductId;

                            var joined = splitted.join('/');

                            var newBuyNowUrl = joined + '/' + lastItem;

                            $('.btn.buynow').attr('data-href', newBuyNowUrl);
                        }
                    } else {
                        attribute.selectedIndex = 0;

                        this.resetChildren(attribute);

                        this.clearSelect(attribute.nextAttribute)
                    }

                    this.reloadPrice();
                    this.changeProductImages();
                },

                getSelectedIndex (attribute, value) {
                    var selectedIndex = 0;

                    attribute.options.forEach(function(option, index) {
                        if (option.id == value) {
                            selectedIndex = index;
                        }
                    })

                    return selectedIndex;
                },

                getSelectedProductId (attribute, value) {
                    var options = attribute.options,
                        matchedOptions;

                    matchedOptions = options.filter(function (option) {
                        return option.id == value;
                    });

                    if (matchedOptions[0] != undefined && matchedOptions[0].allowedProducts != undefined) {
                        return matchedOptions[0].allowedProducts[0];
                    }

                    return undefined;
                },

                fillSelect (attribute) {
                    var options = this.getAttributeOptions(attribute.id),
                        prevOption,
                        index = 1,
                        allowedProducts,
                        i,
                        j;

                    this.clearSelect(attribute)

                    attribute.options = [{'id': '', 'label': this.config.chooseText, 'products': []}];

                    if (attribute.prevAttribute) {
                        prevOption = attribute.prevAttribute.options[attribute.prevAttribute.selectedIndex];
                    }

                    if (options) {
                        for (i = 0; i < options.length; i++) {
                            allowedProducts = [];

                            if (prevOption) {
                                for (j = 0; j < options[i].products.length; j++) {
                                    if (prevOption.products && prevOption.products.indexOf(options[i].products[j]) > -1) {
                                        allowedProducts.push(options[i].products[j]);
                                    }
                                }
                            } else {
                                allowedProducts = options[i].products.slice(0);
                            }

                            if (allowedProducts.length > 0) {
                                options[i].allowedProducts = allowedProducts;

                                attribute.options[index] = options[i];

                                index++;
                            }
                        }
                    }
                },

                resetChildren (attribute) {
                    if (attribute.childAttributes) {
                        attribute.childAttributes.forEach(function (set) {
                            set.selectedIndex = 0;
                            set.disabled = true;
                        });
                    }
                },

                clearSelect: function (attribute) {
                    if (! attribute)
                        return;

                    if (! attribute.swatch_type || attribute.swatch_type == '' || attribute.swatch_type == 'dropdown') {
                        var element = document.getElementById("attribute_" + attribute.id);

                        if (element) {
                            element.selectedIndex = "0";
                        }
                    } else {
                        var elements = document.getElementsByName('super_attribute[' + attribute.id + ']');

                        var this_this = this;

                        elements.forEach(function(element) {
                            element.checked = false;
                        })
                    }
                },

                getAttributeOptions (attributeId) {
                    var this_this = this,
                        options;

                    this.config.attributes.forEach(function(attribute, index) {
                        if (attribute.id == attributeId) {
                            options = attribute.options;
                        }
                    })

                    return options;
                },

                reloadPrice () {
                    var selectedOptionCount = 0;

                    this.childAttributes.forEach(function(attribute) {
                        if (attribute.selectedIndex) {
                            selectedOptionCount++;
                        }
                    });

                    var priceLabelElement = document.querySelector('.price-label');
                    var priceElement = document.querySelector('.final-price');

                    if (this.childAttributes.length == selectedOptionCount) {
                        priceLabelElement.style.display = 'none';

                        priceElement.innerHTML = this.config.variant_prices[this.simpleProduct].final_price.formated_price;

                        eventBus.$emit('configurable-variant-selected-event', this.simpleProduct)
                    } else {
                        priceLabelElement.style.display = 'inline-block';

                        priceElement.innerHTML = this.config.regular_price.formated_price;

                        eventBus.$emit('configurable-variant-selected-event', 0)
                    }
                },

                changeProductImages () {
                    galleryImages.splice(0, galleryImages.length)

                    this.galleryImages.forEach(function(image) {
                        galleryImages.push(image)
                    });

                    if (this.simpleProduct) {
                        this.config.variant_images[this.simpleProduct].forEach(function(image) {
                            galleryImages.unshift(image)
                        });
                    }
                },
            }
        });
    </script>
@endpush
