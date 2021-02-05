<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        view()->composer('admin.layouts.sidebar', function($view){
           $view->with('user', Auth::user());
        });

        view()->composer('header', function($view){
            $view->with('categories', Category::all());
        });

        view()->composer('mightalsolike', function($view){
            $mightalsolike = Product::where('quantity', '>', 0)->inRandomOrder()->take(6)->get();
            $view->with('products', $mightalsolike);
        });
    }
}
