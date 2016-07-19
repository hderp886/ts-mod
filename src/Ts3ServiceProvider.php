<?php

namespace Seat\Ts3;

use Illuminate\Support\ServiceProvider;

class Ts3ServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->addRoutes();
        $this->addViews();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
        public function addRoutes()
    {
        if (!$this->app->routesAreCached()) {
            include __DIR__ . '/Http/routes.php';
        }
    }
    
    public function addViews()
    {
        // $this->loadViewsFrom(__DIR__ . '/resources/views', 'teamspeak');
    }
}