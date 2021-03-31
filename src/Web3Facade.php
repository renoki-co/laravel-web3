<?php

namespace RenokiCo\LaravelWeb3;

use Illuminate\Support\Facades\Facade;

class Web3Facade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel.web3';
    }
}
