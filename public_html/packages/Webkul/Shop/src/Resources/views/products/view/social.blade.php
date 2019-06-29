{!! view_render_event('bagisto.shop.products.view.social.before', ['product' => $product]) !!}
<div class="socila-sharing mt-25">
    <ul class="d-flex">
        <li>share</li>
        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
    </ul>
</div>
{!! view_render_event('bagisto.shop.products.view.social.after', ['product' => $product]) !!}