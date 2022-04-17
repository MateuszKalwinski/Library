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
        //        BOOK INTERFACE
        $this->app->bind(\App\Inposter\Interfaces\BookRepositoryInterface::class,function()
        {
            return new \App\Inposter\Repositories\BookRepository();
        });

        //        CATEGORY INTERFACE
        $this->app->bind(\App\Inposter\Interfaces\CategoryRepositoryInterface::class,function()
        {
            return new \App\Inposter\Repositories\CategoryRepository();
        });

        //        AUTHOR INTERFACE
        $this->app->bind(\App\Inposter\Interfaces\AuthorRepositoryInterface::class,function()
        {
            return new \App\Inposter\Repositories\AuthorRepository();
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
