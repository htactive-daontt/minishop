<?php

namespace App\Providers;

use App\Entities\Categories\Categories;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Categories::where('parent_id', 0)->get();

        Schema::defaultStringLength(191);

        View::share('urlAdmin','/admin');
        View::share('urlHome','/home');
        View::share('urlStorage','/');

        View::share('categories', $categories );
    }
}
