<?php

namespace RenokiCo\LaravelWeb3\Test;

use RenokiCo\LaravelWeb3\Web3 as LaravelWeb3;
use RenokiCo\LaravelWeb3\Web3Facade;
use Web3\Contract;
use Web3\Eth;
use Web3\Net;
use Web3\Personal;
use Web3\Providers\Provider;
use Web3\Shh;
use Web3\Utils;
use Web3\Web3;

class ConfigurationTest extends TestCase
{
    public function test_http_connection()
    {
        $client = Web3Facade::connection('http');

        $abi = '{
            "constant":false,
            "inputs":[
                {
                    "name":"_spender",
                    "type":"address"
                },
                {
                    "name":"_value",
                    "type":"uint256"
                }
            ],
            "name":"approve",
            "outputs":[
                {
                    "name":"success",
                    "type":"bool"
                }
            ],
            "payable":false,
            "stateMutability":"nonpayable",
            "type":"function",
            "test":{
                "name":"testObject"
            }
        }';

        $this->assertInstanceOf(LaravelWeb3::class, $client);
        $this->assertInstanceOf(Web3::class, $client->getClient());
        $this->assertInstanceOf(Eth::class, $client->eth());
        $this->assertInstanceOf(Net::class, $client->net());
        $this->assertInstanceOf(Personal::class, $client->personal());
        $this->assertInstanceOf(Shh::class, $client->shh());
        $this->assertInstanceOf(Utils::class, $client->utils());

        $this->assertInstanceOf(Contract::class, $client->contract($abi));
        $this->assertInstanceOf(Provider::class, $client->getProvider());
        $this->assertInstanceOf(Eth::class, $client->eth);
    }
}
