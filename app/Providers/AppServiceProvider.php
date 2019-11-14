<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\blog\base\IBlogRepository;
use App\Repositories\blog\MySqlBlogRepository as BlogRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IBlogRepository::class, BlogRepository::class);
    }
}
