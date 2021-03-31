Laravel Web3 API Client
=======================

![CI](https://github.com/renoki-co/laravel-web3/workflows/CI/badge.svg?branch=master)
[![codecov](https://codecov.io/gh/renoki-co/laravel-web3/branch/master/graph/badge.svg)](https://codecov.io/gh/renoki-co/laravel-web3/branch/master)
[![StyleCI](https://github.styleci.io/repos/353007715/shield?branch=master)](https://github.styleci.io/repos/353007715)
[![Latest Stable Version](https://poser.pugx.org/renoki-co/laravel-web3/v/stable)](https://packagist.org/packages/renoki-co/laravel-web3)
[![Total Downloads](https://poser.pugx.org/renoki-co/laravel-web3/downloads)](https://packagist.org/packages/renoki-co/laravel-web3)
[![Monthly Downloads](https://poser.pugx.org/renoki-co/laravel-web3/d/monthly)](https://packagist.org/packages/renoki-co/laravel-web3)
[![License](https://poser.pugx.org/renoki-co/laravel-web3/license)](https://packagist.org/packages/renoki-co/laravel-web3)

Laravel Web3 is a Laravel SDK wrapper for the [Web3 PHP API client](https://github.com/web3p/web3.php) that interacts with the Ethereum blockchain.

## 🤝 Supporting

Renoki Co. on GitHub aims on bringing a lot of open source projects and helpful projects to the world. Developing and maintaining projects everyday is a harsh work and tho, we love it.

If you are using your application in your day-to-day job, on presentation demos, hobby projects or even school projects, spread some kind words about our work or sponsor our work. Kind words will touch our chakras and vibe, while the sponsorships will keep the open source projects alive.

[![ko-fi](https://www.ko-fi.com/img/githubbutton_sm.svg)](https://ko-fi.com/R6R42U8CL)

## 🚀 Installation

You can install the package via composer:

```bash
composer require renoki-co/laravel-web3 --ignore-platform-reqs
```

Publish the config:

```bash
$ php artisan vendor:publish --provider="RenokiCo\LaravelWeb3\LaravelWeb3ServiceProvider" --tag="config"
```

## 🙌 Usage

The client configuration can be found in the `config/web3.php` file. Each call will be made from the `\Web3\Web3` class:

```php
use RenokiCo\LaravelWeb3\Web3Facade;

Web3Facade::eth()->provider->execute(function ($err, $data) {
    //
});
```

## Multiple connections

The package supports multiple connections configurations. If you wish to select a specific one (not the default one), call `connection` before getting the cluster.

```php
use RenokiCo\LaravelWeb3\Web3Facade;

Web3Facade::connection('http2')->eth()->provider->execute(function ($err, $data) {
    //
});
```

## Additional methods

The following methods are also available to start with:

```php
use RenokiCo\LaravelWeb3\Web3Facade;

Web3Facade::eth(); // equivalent of $web3->eth
Web3Facade::net();  // equivalent of $web3->net
Web3Facade::personal();  // equivalent of $web3->personal
Web3Facade::shh();  // equivalent of $web3->shh
Web3Facade::utils();  // equivalent of $web3->utils
```

## Working with Contracts

You can also initialize contracts with the same configuration:

```php
use RenokiCo\LaravelWeb3\Web3Facade;

Web3Facade::contract($abi, 'latest')
    ->bytecode($bytecode)
    ->new($params, $callback);
```

## 🐛 Testing

``` bash
vendor/bin/phpunit
```

## 🤝 Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## 🔒  Security

If you discover any security related issues, please email alex@renoki.org instead of using the issue tracker.

## 🎉 Credits

- [Alex Renoki](https://github.com/rennokki)
- [All Contributors](../../contributors)
