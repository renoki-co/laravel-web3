Laravel Web3 API Client
=======================

![CI](https://github.com/renoki-co/laravel-web3/workflows/CI/badge.svg?branch=master)
[![codecov](https://codecov.io/gh/renoki-co/laravel-web3/branch/master/graph/badge.svg)](https://codecov.io/gh/renoki-co/laravel-web3/branch/master)
[![StyleCI](https://github.styleci.io/repos/353007715/shield?branch=master)](https://github.styleci.io/repos/353007715)
[![Latest Stable Version](https://poser.pugx.org/renoki-co/laravel-web3/v/stable)](https://packagist.org/packages/renoki-co/laravel-web3)
[![Total Downloads](https://poser.pugx.org/renoki-co/laravel-web3/downloads)](https://packagist.org/packages/renoki-co/laravel-web3)
[![Monthly Downloads](https://poser.pugx.org/renoki-co/laravel-web3/d/monthly)](https://packagist.org/packages/renoki-co/laravel-web3)
[![License](https://poser.pugx.org/renoki-co/laravel-web3/license)](https://packagist.org/packages/renoki-co/laravel-web3)

Laravel Web3 is a Laravel SDK wrapper for the [Web3 PHP API client](https://github.com/web3-php/web3) that interacts with the Ethereum blockchain.

## 🤝 Supporting

**If you are using one or more Renoki Co. open-source packages in your production apps, in presentation demos, hobby projects, school projects or so, sponsor our work with [Github Sponsors](https://github.com/sponsors/rennokki). 📦**

[<img src="https://github-content.s3.fr-par.scw.cloud/static/34.jpg" height="210" width="418" />](https://github-content.renoki.org/github-repo/34)

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
use RenokiCo\LaravelWeb3\Web3Facade as Web3;

Web3::eth()->hashRate();
```

## Multiple connections

The package supports multiple connections configurations. If you wish to select a specific one (not the default one), call `connection` before getting the cluster.

```php
use RenokiCo\LaravelWeb3\Web3Facade as Web3;

Web3Facade::connection('http2')->eth()->hashRate();
```

## Additional methods

The following methods are also available to start with:

```php
use RenokiCo\LaravelWeb3\Web3Facade as Web3;

Web3::eth()->coinbase();
Web3::net()->version();
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
