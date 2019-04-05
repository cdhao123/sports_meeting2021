<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ApiRenderProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\ApiRender\Contracts\Render', function ($app) {
            return new \App\ApiRender\Eloquent\Render();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
