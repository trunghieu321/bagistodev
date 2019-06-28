<div class="box-quantity d-flex hot-product2 mt-20">
    <form action="#">
        <input class="quantity mr-15" name="quantity" type="number" min="1" value="1">
    </form>
    <div class="pro-actions">

        <div class="actions-primary">
            <a v-on:click="addCart()"  title="" data-original-title="Add to Cart"> + Add To Cart</a>
        </div>
        <div class="actions-secondary">
            <a href="compare.html" title="" data-original-title= Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
            <a href="wishlist.html" title="" data-original-title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
        </div>
    </div>
</div>