<?php

namespace RenokiCo\LaravelWeb3;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \RenokiCo\LaravelWeb3\Web3 connection(string $connection)
 * @method static \Web3\Web3 getClient()
 * @method static string clientVersion()
 * @method static string sha3(string $data)
 * @method static \Web3\Namespaces\Eth eth()
 * @method static \Web3\Namespaces\Net net()
 *
 * @see \Web3\Web3
 * @see \RenokiCo\LaravelWeb3\Web3
 */
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
