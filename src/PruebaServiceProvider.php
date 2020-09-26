<?php

namespace Kumasagati\Prueba;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

class PruebaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Kumasagati\Prueba\Controllers\ProductController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        $this->loadViewsFrom(__DIR__ . '/views', 'kumasagati/prueba');
        $this->publishes([
            __DIR__ . '/views' => base_path('resources/views/kumasagati/prueba')
        ]);
        Artisan::call("migrate");
        Artisan::call("clear-compiled");
        Artisan::call("vendor:publish", [
            '--provider' => 'Kumasagati\Prueba\PruebaServiceProvider'
        ]);
    }
}
