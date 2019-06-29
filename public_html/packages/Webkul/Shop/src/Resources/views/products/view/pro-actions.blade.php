<div class="box-quantity d-flex hot-product2 mt-20">
    <form method="POST" id="product-form" action="{{ route('cart.add', $product['id']) }}" @click="addCart($event)">>
        <div class="pro-actions">
            <input class="quantity mr-15" name="quantity" type="number" min="1" value="1">
            <input type="hidden" id="selected_configurable_option" name="selected_configurable_option" value="{{$product['id']}}">
            <div class="actions-primary">
                <a data-original-title="Add to Cart"> + Add To Cart</a>
            </div>

            <div class="actions-secondary">
                <a href="compare.html" title="" data-original-title= Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                <a href="wishlist.html" title="" data-original-title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
            </div>
        </div>
    </form>
</div>