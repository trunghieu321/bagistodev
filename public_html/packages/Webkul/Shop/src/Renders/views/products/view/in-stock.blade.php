<div class="pro-ref mt-20">
    <p>
        <span class="in-stock {{ $product->type != 'configurable' && !$product->haveSufficientQuantity(1) ? '' : 'active' }}">
            <i class="ion-checkmark-round"></i>
            {{ $product->type != 'configurable' && !$product->haveSufficientQuantity(1) ? __('shop::app.products.out-of-stock') : __('shop::app.products.in-stock') }}
        </span>
    </p>
</div>