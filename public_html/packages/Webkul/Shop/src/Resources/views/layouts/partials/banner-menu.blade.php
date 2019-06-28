@if(!empty($menuBanner->items))
<!-- Brand Banner Area Start Here -->
<div class="image-banner pb-50 off-white-bg">
    <div class="container">
            @foreach($menuBanner as $keyBanner => $valBanner)
        <div class="col-img">
            <a href="#"><img src="{{$valBanner->image_path}}" alt="{{$valBanner->name}}"></a>
        </div>
            @endforeach
    </div>
    <!-- Container End -->
</div>
<!-- Brand Banner Area End Here -->
@endif