@if($pro_flat_type == "simple") 
<div class="pro-price mtb-30">
    <p class="d-flex align-items-center">
        <span class="prev-price">@{{ product.cost }}</span>
        <span class="price">@{{ product.price }}</span>
        <span class="saving-price">save @{{ product.discount }}%</span>
    </p>
</div>
@else
<div class="pro-price mtb-30">
    <p class="d-flex align-items-center">
        <span class="price">@{{ product.config.regular_price.price }}</span>
    </p>
</div>
@endif