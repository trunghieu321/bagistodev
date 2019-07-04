@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
@php
    $cart = cart()->getCart();
@endphp

@if($cart)
    @php
        Cart::collectTotals();
        $items = $cart->items;
    @endphp
    <div class="cart-box mt-all-30">
        <ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
            <li><a href="#">
                    <i class="lnr lnr-cart"></i>
                    <span class="my-cart">
                        <span class="total-pro">{{ $cart->items->count() }}</span>
                        <span>cart</span>
                    </span>
                </a>
                <ul class="ht-dropdown cart-box-width">
                    <li>
                    @if($items)
                        <!-- Cart Box Start -->
                        @foreach($items as $item)
                        @php
                        $price = $item->price - $item->discount_amount;
                        $total = $item->total - $item->discount_amount;
                        $images = $productImageHelper->getProductBaseImage($item->product);
                        @endphp
                            <div class="single-cart-box">
                                <div class="cart-img">
                                    <a>
                                        <img src="{{ $images['small_image_url'] }}" alt="{{ $item->name }}">
                                    </a>
                                    <span class="pro-quantity">{{ $item->quantity }}X</span>
                                </div>
                                <div class="cart-content">
                                    <h6><a>{{ $item->name }}</a></h6>
                                    <span class="cart-price">{{ number_format($price) }} đ</span>
                                </div>
                                <a class="del-icone" href="{{ url('checkout/cart/remove', $item->id) }}"><i class="ion-close"></i></a>
                            </div>
                        @endforeach
                    @endif
                    <!-- Cart Box End -->
                        <!-- Cart Footer Inner Start -->
                        <div class="cart-footer">
                            <ul class="price-content">
                                <li>Total <span>{{ number_format($total) }} đ</span></li>
                            </ul>
                            <div class="cart-actions text-center">
                                <a class="cart-checkout" href="{{ route('shop.checkout.cart.index') }}">{{ __('shop::app.headers.checkout') }}</a>
                            </div>
                        </div>
                        <!-- Cart Footer Inner End -->
                    </li>
                </ul>
            </li>
            <li><a href="#"><i class="lnr lnr-heart"></i><span
                            class="my-cart"><span>{{ __('shop::app.headers.wish') }}</span><span>{{ __('shop::app.headers.list') }} (0)</span></span></a>
            </li>
            <li><a href="#"><i class="lnr lnr-user"></i><span
                            class="my-cart"><span> <strong>{{ __('shop::app.headers.sign-in') }}</strong> {{ __('shop::app.headers.or') }}</span><span> {{ __('shop::app.headers.join-my-site') }}</span></span></a>
            </li>
        </ul>
    </div>
@else
    <div class="cart-box mt-all-30">
        <ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
            <li>
                <a href="#"><i class="lnr lnr-cart"></i>
                    <span class="my-cart">
                    <span class="total-pro">0</span>
                    <span>cart</span>
                </span>
                </a>
            </li>
            <li>
                <a href="#"><i class="lnr lnr-heart"></i><span
                            class="my-cart"><span>{{ __('shop::app.headers.wish') }}</span><span>{{ __('shop::app.headers.list') }} (0)</span></span></a>
            </li>
            <li><a href="#"><i class="lnr lnr-user"></i><span
                            class="my-cart"><span> <strong>{{ __('shop::app.headers.sign-in') }}</strong> {{ __('shop::app.headers.or') }}</span><span> {{ __('shop::app.headers.join-my-site') }}</span></span></a>
        </ul>
    </div>
@endif
