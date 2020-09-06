<?php

namespace App\Providers;

use App\Category;
use App\Order;
use View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('front-end.includes.menu', function ($view){
            $view->with('categories',Category::where('status',1)->get());
        });

        View::composer('admin.includes.aside', function ($view){
            $view->with('order_count',Order::where('order_status',0)->get());
        });
    }
}
