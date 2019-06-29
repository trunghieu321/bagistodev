{!! view_render_event('bagisto.shop.products.view.in-stock.before', ['product' => $product]) !!}
<div class="pro-ref mt-20">
    <p>
        <span v-if="product.in_stock" class="in-stock">
            <i class="ion-checkmark-round"></i>
            In stock
        </span>
        <span v-if="!product.in_stock" class="out-of-stock">
            <i class="ion-checkmark-round"></i>
            Out of stock
        </span>
    </p>
</div>
{!! view_render_event('bagisto.shop.products.view.in-stock.after', ['product' => $product]) !!}