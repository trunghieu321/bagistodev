<?php

namespace Webkul\Shop\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Webkul\Product\Helpers\ProductImage;
use View;

/**
 * Composer service provider
 *
 * @author    Jitendra Singh <jitendra@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['shop::layouts.partials.category-main', 'shop::layouts.partials.headers.search'],
            'Webkul\Shop\Http\ViewComposers\CategoryComposer'
        );

        View::composer(
            ['shop::home.new-arrivals'],
            'Webkul\Shop\Http\ViewComposers\NewProductListComposer'
        );

        View::composer(
            ['shop::home.best-seller'],
            'Webkul\Shop\Http\ViewComposers\BestSellProductListComposer'
        );

        View::composer(
            ['shop::home.featured-products'],
            'Webkul\Shop\Http\ViewComposers\FeaturedProductListComposer'
        );
    }
}