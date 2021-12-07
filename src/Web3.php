<?php

namespace RenokiCo\LaravelWeb3;

use Web3\Web3 as Web3Client;

/**
 * @method static string clientVersion()
 * @method static string sha3(string $data)
 * @method \Web3\Namespaces\Eth eth()
 * @method \Web3\Namespaces\Net net()
 *
 * @see \Web3\Web3
 */
class Web3
{
    /**
     * The Web3 client.
     *
     * @var \Web3\Web3
     */
    protected $client;

    /**
     * The connection name used.
     *
     * @var string
     */
    protected $connection;

    /**
     * The currently config applied.
     *
     * @var array
     */
    protected $config;

    /**
     * Create a new Web3 client.
     *
     * @param  string  $connection
     * @param  array  $config
     */
    public function __construct(string $connection, array $config)
    {
        $this->loadFromConfig($connection, $config);
    }

    /**
     * Switch the connection.
     *
     * @param  string  $connection
     * @return $this
     */
    public function connection(string $connection)
    {
        $this->loadFromConfig(
            $connection,
            config('web3.connections')[$connection] ?? config('web3.default')
        );

        return $this;
    }

    /**
     * Load the Web3 Client instance from the given config.
     *
     * @param  string  $connection
     * @param  array  $config
     * @return void
     */
    protected function loadFromConfig(string $connection, array $config)
    {
        $this->connection = $connection;
        $this->config = $config;
        $this->client = new Web3Client($config['host']);
    }

    /**
     * Get the initialized client.
     *
     * @return \Web3\Web3
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Proxy the calls onto client objects.
     *
     * @param  string  $prop
     * @return mixed
     */
    public function __get(string $prop)
    {
        return $this->getClient()->{$prop};
    }

    /**
     * Proxy the calls onto the Web3 client.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->getClient()->{$method}(...$parameters);
    }
}
