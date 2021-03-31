<?php

namespace RenokiCo\LaravelWeb3;

use Web3\Web3 as Web3Client;
use Web3\Contract as Web3Contract;

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

        $this->client = new Web3Client($this->getProviderFromConfig($config));
    }

    /**
     * Get the Web3 Client provider from configuration.
     *
     * @param  array  $config
     * @return \Web3\Providers\Provider
     */
    protected function getProviderFromConfig(array $config)
    {
        $providerClass = $config['provider'] ?? \Web3\Providers\HttpProvider::class;
        $requestManagerClass = $config['request_manager'] ?? \Web3\RequestManagers\RequestManager::class;

        return new $providerClass(new $requestManagerClass(
            $config['host'], $config['timeout'] ?? 1
        ));
    }

    /**
     * Create a new ETH contract.
     *
     * @param  string|\stdClass|array  $abi
     * @param  mixed  $block
     * @return \Web3\Contract
     */
    public function contract($abi, $block = 'latest')
    {
        return new Web3Contract($this->getProviderFromConfig($this->config), $abi, $block);
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
     * Get the ETH client.
     *
     * @return \Web3\Eth
     */
    public function eth()
    {
        return $this->getClient()->getEth();
    }

    /**
     * Get the Net client.
     *
     * @return \Web3\Net
     */
    public function net()
    {
        return $this->getClient()->getNet();
    }

    /**
     * Get the Personal client.
     *
     * @return \Web3\Personal
     */
    public function personal()
    {
        return $this->getClient()->getPersonal();
    }

    /**
     * Get the SHH client.
     *
     * @return \Web3\Shh
     */
    public function shh()
    {
        return $this->getClient()->getShh();
    }

    /**
     * Get the Utils client.
     *
     * @return \Web3\Utils
     */
    public function utils()
    {
        return $this->getClient()->getUtils();
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
