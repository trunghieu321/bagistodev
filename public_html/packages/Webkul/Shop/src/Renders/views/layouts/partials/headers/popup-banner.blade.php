<span class="popup_off_banner">×</span>
<div class="banner_popup_area">
    @if(!empty($headerBanner))
        @foreach($headerBanner as $keyBanner => $valBanner)
    <img src="{{asset('storage/'.$valBanner->image_path)}}" alt="{{$valBanner->name}}">
        @endforeach
    @endif
</div>