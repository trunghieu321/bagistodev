<div class="cart-box mt-all-30">
    <ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
        <li><a href="#"><i class="lnr lnr-cart"></i><span class="my-cart"><span class="total-pro">2</span><span>cart</span></span></a>
            <ul class="ht-dropdown cart-box-width">
                <li>
                    <!-- Cart Box Start -->
                    <div class="single-cart-box">
                        <div class="cart-img">
                            <a href="#"><img src="{{asset("vendor/truemart")}}/img/products/1.jpg" alt="cart-image"></a>
                            <span class="pro-quantity">1X</span>
                        </div>
                        <div class="cart-content">
                            <h6><a href="product.html">Printed Summer Red </a></h6>
                            <span class="cart-price">27.45</span>
                            <span>Size: S</span>
                            <span>Color: Yellow</span>
                        </div>
                        <a class="del-icone" href="#"><i class="ion-close"></i></a>
                    </div>
                    <!-- Cart Box End -->
                    <!-- Cart Box Start -->
                    <div class="single-cart-box">
                        <div class="cart-img">
                            <a href="#"><img src="{{asset("vendor/truemart")}}/img/products/2.jpg" alt="cart-image"></a>
                            <span class="pro-quantity">1X</span>
                        </div>
                        <div class="cart-content">
                            <h6><a href="product.html">Printed Round Neck</a></h6>
                            <span class="cart-price">45.00</span>
                            <span>Size: XL</span>
                            <span>Color: Green</span>
                        </div>
                        <a class="del-icone" href="#"><i class="ion-close"></i></a>
                    </div>
                    <!-- Cart Box End -->
                    <!-- Cart Footer Inner Start -->
                    <div class="cart-footer">
                        <ul class="price-content">
                            <li>Subtotal <span>$57.95</span></li>
                            <li>Shipping <span>$7.00</span></li>
                            <li>Taxes <span>$0.00</span></li>
                            <li>Total <span>$64.95</span></li>
                        </ul>
                        <div class="cart-actions text-center">
                            <a class="cart-checkout" href="checkout.html">{{ __('shop::app.headers.checkout') }}</a>
                        </div>
                    </div>
                    <!-- Cart Footer Inner End -->
                </li>
            </ul>
        </li>
        <li><a href="#"><i class="lnr lnr-heart"></i><span class="my-cart"><span>{{ __('shop::app.headers.wish') }}</span><span>{{ __('shop::app.headers.list') }} (0)</span></span></a>
        </li>
        <li><a href="#"><i class="lnr lnr-user"></i><span class="my-cart"><span> <strong>{{ __('shop::app.headers.sign-in') }}</strong> {{ __('shop::app.headers.or') }}</span><span> {{ __('shop::app.headers.join-my-site') }}</span></span></a>



        </li>
    </ul>
</div>