<?php

namespace RenokiCo\LaravelWeb3\Test;

use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * {@inheritdoc}
     */
    protected function getPackageProviders($app)
    {
        return [
            \RenokiCo\LaravelWeb3\LaravelWeb3ServiceProvider::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.key', 'wslxrEFGWY6GfGhvN9L3wH3KSRJQQpBD');
        $app['config']->set('web3.default', 'http');
        $app['config']->set('web3.connections.http', [
            'driver' => 'http',
            'host' => 'http://localhost:8545',
            'provider' => \Web3\Providers\HttpProvider::class,
            'request_manager' => \Web3\RequestManagers\RequestManager::class,
        ]);
    }
}
