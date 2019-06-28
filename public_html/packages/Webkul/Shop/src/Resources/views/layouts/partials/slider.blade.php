@if(!empty($sliders))
<!-- Slider Area Start Here -->
<div class="col-xl-9 col-lg-8 slider_box">
    <div class="slider-wrapper theme-default">
        <!-- Slider Background  Image Start-->
        <div id="slider" class="nivoSlider">
            @foreach($sliders as $keySlider => $valSlider)
            <a href="shop.html"><img src="{{asset("storage/".$valSlider->image_path)}}" data-thumb="{{asset("storage/".$valSlider->image_path)}}" alt="{{$valSlider->name}}" title="#htmlcaption" /></a>
            @endforeach
        </div>
        <!-- Slider Background  Image Start-->
    </div>
</div>
<!-- Slider Area End Here -->
@endif