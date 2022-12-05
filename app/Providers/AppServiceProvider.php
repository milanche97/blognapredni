<?php

namespace App\Providers;

use App\Models\Tag;
use Illuminate\pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

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
        Paginator::useBootstrapFive();

        view()->composer('layouts.master',
         function (View $view){
           $tags =  Tag::has('posts')->get();
           $view->with(compact('tags'));
         }
        );
    }
}
