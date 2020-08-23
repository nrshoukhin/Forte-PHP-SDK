# Forte REST API SDK for PHP

__Welcome to Forte PHP SDK__. This repository contains Forte's PHP SDK for [Forte REST API V3](https://restdocs.forte.net/?version=latest).

## Prerequisites

- PHP 5.3 or above
- [curl](https://secure.php.net/manual/en/book.curl.php), [json](https://secure.php.net/manual/en/book.json.php) & [openssl](https://secure.php.net/manual/en/book.openssl.php) extensions must be enabled

## Installation

To install this package run this command in you terminal from project root

```shell
composer require nrshoukhin/forte-php-sdk
```

### For Laravel
Open your laravel project's `config/app.php` and add this service provider element in providers array

```php
Shoukhin\Forte\ForteServiceProvider::class,
```

and add this facade element in aliases array

```php
'Forte' => Shoukhin\Forte\Facades\Forte::class,
```

Run this artisan command in your terminal

```shell
php artisan vendor:publish --provider="Shoukhin\Forte\ForteServiceProvider"
```

after executing the command successfully, go to your project config folder then open `forte.php` (Location: `Your_laravel_project_folder/config/forte.php`) and add your forte rest api credentials.

```php
return [
    'access_id' => 'provide_forte_access_id',

    'secret_id' => 'provide_forte_secret_id',

    'mode'  =>  'provide_mode', //live or sandbox
    
    'org_id' => 'provide_the_forte_organization_id',

    'loc_id' => 'provide_the_forte_location_id'
];
```
