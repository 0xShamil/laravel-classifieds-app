<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Area;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Area::creating(function($area) {
            $prefix = $area->parent ? $area->parent->name . '-' : '';
            $area->slug = str_slug($prefix . $area->name);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
