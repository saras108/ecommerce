<?php

namespace Admin;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'./Views','admin');
        $this->loadTranslationsFrom(__DIR__.'./Lang','admin');
        $this->loadMigrationsFrom(__DIR__.'./Migrations');
        // $this->loadRoutesFrom(__DIR__.'/Routes/web.php');

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