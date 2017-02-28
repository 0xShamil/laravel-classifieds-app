<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

use App\Http\ViewComposers\AreaComposer;

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

        View::composer(['listings.partials.form._areas', 'listings.partials.form._categories'], function($view) {
            $categories = Category::get()->toTree();
            $areas = Area::get()->toTree();

            $view->with(compact('categories', 'areas'));
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
