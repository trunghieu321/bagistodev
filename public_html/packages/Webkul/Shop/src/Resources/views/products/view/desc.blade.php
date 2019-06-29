{!! view_render_event('bagisto.shop.products.view.desc.before', ['product' => $product]) !!}
@php
    $description = $product['description'];
@endphp
<div id="dtail" class="tab-pane fade show active">
    {!! $description !!}
</div>
{!! view_render_event('bagisto.shop.products.view.desc.after', ['product' => $product]) !!}