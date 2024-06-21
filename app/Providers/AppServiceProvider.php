<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Article;

use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();
        View::composer('master', function ($view) {
            return $view->with('lastPostedArticle', \App\Models\Article::all()->last()->name);
        });
    }
}
