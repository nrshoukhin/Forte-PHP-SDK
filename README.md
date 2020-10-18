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

## Usages
Here, providing an example to get all customer(s) of an organization in your PHP project.\
**Note:** Include the `autoload.php` according to your project path structure.
```php
<?php
include "vendor/autoload.php";
use Shoukhin\Forte\Api\Authentication;
use Shoukhin\Forte\Api\Address;

$access_id = "provide your Forte access ID";
$secret_id = "provide your Forte secret ID";
$authentication = new Authentication( $access_id, $secret_id );

$authentication->set_config(
        array(
            "mode"   => "sandbox", //sandbox or live
            "org_id" => "provide the organization ID",
            "loc_id" => "provide the location ID"
        )
);

$forte = new Customer($authentication);
$customer = $forte->getCustomerOfOrganization();
echo "<pre>";
var_dump( $customer );
?>
```

### For Laravel Usage

For an Example, Using a controller named `ForteController` to collect all customer(s) of an organization.
 
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shoukhin\Forte\Facades\Forte;

class ForteController extends Controller
{
    public function getAllCustomers(){
        $data = Forte::Customer()->getCustomerOfOrganization();
        echo "<pre>";
        var_dump( $data );
        return;
    }
}
```

## SDK Documentation

[Click Here](https://nrshoukhin.github.io/Forte-PHP-SDK/){:target="_blank"} to see the documentation of this SDK.
