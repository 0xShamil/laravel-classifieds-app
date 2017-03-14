<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

use App\Http\ViewComposers\AreaComposer;
use App\Http\ViewComposers\NavigationComposer;

use App\Models\{Category, Area};

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', AreaComposer::class);
        View::composer('layouts.partials._navigation', NavigationComposer::class);

        View::composer(['listings.partials.form._categories'], function($view) {
            $categories = Category::get()->toTree();

            $view->with(compact('categories'));
        });

        View::composer(['listings.partials.form._areas'], function($view) {
            $areas = Area::get()->toTree();

            $view->with(compact('areas'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AreaComposer::class);
    }
}
