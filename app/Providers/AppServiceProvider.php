<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Area;
use App\Models\Category;

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

        Category::creating(function($category) {
            $prefix = $category->parent ? $category->parent->name . '-' : '';
            $category->slug = str_slug($prefix . $category->name);
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
