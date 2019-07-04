<div class="box-quantity d-flex hot-product2 mt-20">
    <form method="POST" id="product-form" action="{{ route('cart.add', $product['id']) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" id="selected_configurable_option" name="selected_configurable_option" value="{{$product['id']}}">
        <div class="pro-actions">
            <input class="quantity mr-15" name="quantity" type="number" min="1" value="1">
            <div class="actions-primary">
                <button type="submit"> + Add To Cart</button>
            </div>
        </div>
    </form>
</div>
