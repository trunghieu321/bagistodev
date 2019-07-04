<div class="header-top">
    <ul>
        <li><a href="#">{{ __('shop::app.headers.free-shipping-on-order-over-99') }}</a></li>
        <li><a href="#">{{ __('shop::app.headers.shopping-cart') }}</a></li>
        <li><a href="{{ route('shop.checkout.cart.index') }}">{{ __('shop::app.headers.checkout') }}</a></li>
    </ul>
    <ul>
        <li><span>{{ __('shop::app.headers.language') }}</span> <a href="#">{{ __('shop::app.headers.english') }}<i class="lnr lnr-chevron-down"></i></a>
            <!-- Dropdown Start -->
            <ul class="ht-dropdown">
                <li><a href="#"><img src="{{asset("vendor/truemart")}}/img/header/1.jpg" alt="language-selector">English</a></li>
                <li><a href="#"><img src="{{asset("vendor/truemart")}}/img/header/2.jpg" alt="language-selector">Francis</a></li>
            </ul>
            <!-- Dropdown End -->
        </li>
        <li><span>{{ __('shop::app.headers.currency') }}</span><a href="#"> USD $ <i class="lnr lnr-chevron-down"></i></a>
            <!-- Dropdown Start -->
            <ul class="ht-dropdown">
                <li><a href="#">&#36; USD</a></li>
            </ul>
            <!-- Dropdown End -->
        </li>
        <li><a href="#">{{ __('shop::app.headers.my-account') }}<i class="lnr lnr-chevron-down"></i></a>
            <!-- Dropdown Start -->
            <ul class="ht-dropdown">
                <li><a href="{{ route('customer.session.index') }}">{{ __('shop::app.headers.login') }}</a></li>
                <li><a href="{{ route('customer.register.index') }}">{{ __('shop::app.headers.register') }}</a></li>
            </ul>
            <!-- Dropdown End -->
        </li>
    </ul>
</div>
