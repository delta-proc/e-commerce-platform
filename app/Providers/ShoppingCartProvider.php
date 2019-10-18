<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ShoppingCart\ShoppingCart;
use App\Services\ShoppingCart\Drivers\SessionDriver;
use App\Services\ShoppingCart\DriverContract;

class ShoppingCartProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        // Register ShoppingCart driver implementation
        $this->app->when(ShoppingCart::class)
          ->needs(DriverContract::class)
          ->give(function () {
              return new SessionDriver();
          });
    }
}
