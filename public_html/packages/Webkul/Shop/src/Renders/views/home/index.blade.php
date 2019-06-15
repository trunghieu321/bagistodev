@extends('shop::layouts.app')

@section('content')
    <!-- Categorie Menu & Slider Area End Here -->
    @include('shop::layouts.partials.banner-menu')

    <!-- Hot Deal Products Start Here -->
    <div class="hot-deal-products off-white-bg pb-sm-50">
        @include('shop::home.host-deal-products')
    </div>
    <!-- Hot Deal Products End Here -->
    <!-- Hot Feature Products Start Here -->
    <div class="hot-feature-products off-white-bg pb-sm-50">
        @include('shop::home.featured-products')
    </div>
    <!-- Hot Deal Products End Here -->

    <!-- Arrivals Products Area Start Here -->
    <div class="arrivals-product pb-85 pb-sm-45">
        <div class="container">
            @include('shop::home.new-products')
        </div>
        <!-- Container End -->
    </div>
    <!-- Arrivals Products Area End Here -->
    <!-- Arrivals Products Area Start Here -->
    <div class="second-arrivals-product pb-45 pb-sm-5">
        <div class="container">
            @include('shop::home.best-seller-products')
        </div>
        <!-- Container End -->
    </div>
    <!-- Arrivals Products Area End Here -->
    <!-- Like Products Area Start Here -->
    <div class="like-product ptb-95 off-white-bg pt-sm-50 pb-sm-55 ">
        <div class="container">
           @include('shop::home.you-like-products')
        </div>
        <!-- Container End -->
    </div>
@endsection
