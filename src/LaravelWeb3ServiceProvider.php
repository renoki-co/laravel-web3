<?php

namespace RenokiCo\LaravelWeb3;

use Illuminate\Support\ServiceProvider;

class LaravelWeb3ServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/web3.php' => config_path('web3.php'),
        ], 'config');

        $this->mergeConfigFrom(
            __DIR__.'/../config/web3.php', 'web3'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
