@php
    if(!isset($firstLi)) {
        $firstLi = "Home";
    }

    if(isset($lastLi)) {
        $lastLi = $lastLi;
    }

    if(isset($nextLi)) {
        $nextLi = $nextLi;
    }
@endphp
<!-- Breadcrumb Start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="{{route('shop.home.index')}}">{{ $firstLi }}</a></li>
                <li><a>{{ $lastLi }}</a></li>
                <li class="active">
                    <a href="{{route($routeName, $key)}}">{{ $nextLi }}</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
