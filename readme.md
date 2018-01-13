# THIS LIBRARY IS NO LONGER MAINTAINED

# Easi - A Eve Online ESI Api wrapper 

<a href="https://styleci.io/repos/86077357"><img src="https://styleci.io/repos/86077357/shield" alt="StyleCI"></a>

## Requirements
PHP 7.0 or later

## Installation

Use composer to install:

```
composer require nullx27/easi
```

## Getting started

```php
<?php
   
require_once(__DIR__ . '/vendor/autoload.php');

$easi = new \nullx27\Easi\Easi();
$alliance = $easi->alliance->getAllianceById(99006112);

print $alliance->allianceName; // Friendly Probes
```

To use authenticated ESI calls please provide a valid access token

```php
<?php
   
require_once(__DIR__ . '/vendor/autoload.php');

$token = 'valid access token';
$characterId = 123456789;

$easi = new \nullx27\Easi\Easi($token);
$wallet = $easi->wallet->getCharacterWallet($characterId);

print_r($wallet->data);
```

#### For a full list of all available endpoints and methods see [here](https://nullx27.github.io/easi/namespace-nullx27.Easi.Api.Endpoints.html)

## Configuration

Easi can use any PSR-16 compatible caching libary to stay in line with CCP request guidelines

```php
$easi = new \nullx27\Easi\Easi();
$easi->getConfig()->setCache($yourCacheInstance);
```

The same works with PSR-3 compatible Loggers:

```php
$easi = new \nullx27\Easi\Easi();
$easi->getConfig()->setLogger($yourLoggerInstance);
```

You can set a different datasource for your esi requests. The default is 'tranquility'.

```php
$easi = new \nullx27\Easi\Easi();
$easi->getConfig()->setDatasource('singularity'); 
```

## Bug repots

Please use [Github Issues](https://github.com/nullx27/easi/issues) for bug reports.
