@extends('shop::layouts.app')

@section('content')
@php
    $routeName = "shop.checkout.cart.index";
    $lastLi = "Checkout";
    $nextLi = "Cart";
@endphp
@include('shop::layouts.partials.breadcrumb', [ 'routeName' => $routeName,
                                                'key' => [],
                                                'lastLi' => $lastLi,
                                                'nextLi' => $nextLi
                                                ])

@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
@php
    $cart = cart()->getCart();
@endphp

@if($cart)
    @php
        Cart::collectTotals();
        $items = $cart->items;
    @endphp
<div class="cart-main-area ptb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <!-- Form Start -->
                <form action="{{ route('shop.checkout.cart.update') }}" method="POST">
                    @csrf
                    <!-- Table Content Start -->
                    <div class="table-content table-responsive mb-45">
                        <table>
                            <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($items)
                                @foreach($items as $item)
                                @php
                                $price = $item->price - $item->discount_amount;
                                $total = $item->total - $item->discount_amount;
                                $images = $productImageHelper->getProductBaseImage($item->product);
                                @endphp
                            <tr>
                                <td class="product-thumbnail">
                                    <a href="">
                                        <img src="{{ $images['small_image_url'] }}" alt="{{ $item->name }}">
                                    </a>
                                </td>
                                <td class="product-name"><a href="">{{ $item->name }}</a></td>
                                <td class="product-price"><span class="amount">{{ number_format($price) }} đ</span></td>
                                <td class="product-quantity"><input type="number" name="qty[{{$item->id}}]" value="{{ $item->quantity }}"></td>
                                <td class="product-subtotal">{{ number_format($total) }} đ</td>
                                <td class="product-remove"> 
                                    <a href="{{ url('checkout/cart/remove', $item->id) }}">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                                @endforeach
                            @else
                                Cart is empty.
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- Table Content Start -->
                    <div class="row">
                        <!-- Cart Button Start -->
                        <div class="col-md-8 col-sm-12">
                            <div class="buttons-cart">
                                <input type="submit" value="Update Cart">
                                <a href="{{ route('shop.home.index') }}">Continue Shopping</a>
                            </div>
                        </div>
                        <!-- Cart Button Start -->
                        <!-- Cart Totals Start -->
                        <div class="col-md-4 col-sm-12">
                            <div class="cart_totals float-md-right text-md-right">
                                <h2>Cart Totals</h2>
                                <br>
                                <table class="float-md-right">
                                    <tbody>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td>
                                            <strong><span class="amount">$215.00</span></strong>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <a href="{{ route('shop.checkout.onepage.index' )}}">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                        <!-- Cart Totals End -->
                    </div>
                    <!-- Row End -->
                </form>
                <!-- Form End -->
            </div>
        </div>
        <!-- Row End -->
    </div>
</div>
@endif
@endsection
