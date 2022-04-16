<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;

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
        //        POST INTERFACE
        $this->app->bind(\App\Inposter\Interfaces\PostRepositoryInterface::class,function()
        {
            return new \App\Inposter\Repositories\PostRepository();
        });

        //        CATEGORY INTERFACE
        $this->app->bind(\App\Inposter\Interfaces\CategoryRepositoryInterface::class,function()
        {
            return new \App\Inposter\Repositories\CategoryRepository();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

    }
}
