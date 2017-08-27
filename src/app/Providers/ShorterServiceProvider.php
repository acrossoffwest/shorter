<?php

namespace Acrossoffwest\Shorter\Providers;

use Illuminate\Support\ServiceProvider;

class ShorterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/shorter.php' => config_path('shorter.php'),
            __DIR__.'/../../resources/views' => resource_path('views/vendor/shorter')
        ]);

        $this->publishes([
            __DIR__.'/../../resources/assets' => public_path('vendor/shorter')
        ], 'public');

        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'shorter');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/shorter.php', 'shorter');
    }
}
