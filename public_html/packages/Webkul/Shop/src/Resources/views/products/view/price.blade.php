{!! view_render_event('bagisto.shop.products.view.price.before', ['product' => $product]) !!}
<div class="pro-price mtb-30">
    <p class="d-flex align-items-center">
        <span v-if="product.cost > 0" class="prev-price">@{{ product.formated_price }} đ</span>
        <span v-if="product.cost > 0" class="price">@{{ product.formated_cost }} đ</span>

        <span v-if="product.cost == 0" class="price">@{{ product.formated_price }} đ</span>
        <span class="saving-price">save @{{ product.discount }}%</span>
    </p>
</div>
{!! view_render_event('bagisto.shop.products.view.price.after', ['product' => $product]) !!}