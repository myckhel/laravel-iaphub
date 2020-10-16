# Iaphub

[![Latest Version on Packagist](https://img.shields.io/packagist/v/myckhel/laravel-iaphub.svg?style=flat-square)](https://packagist.org/packages/myckhel/laravel-iaphub)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Travis](https://img.shields.io/travis/myckhel/laravel-iaphub.svg?style=flat-square)]()
[![Total Downloads](https://img.shields.io/packagist/dt/myckhel/laravel-iaphub.svg?style=flat-square)](https://packagist.org/packages/myckhel/laravel-iaphub)

## [Iaphub Doc Link](https://iaphub.com/docs)

## Install
Via Composer
```bash
composer require myckhel/laravel-iaphub
```

## Setup
The package will automatically register a service provider.

You need to publish the configuration file:

```bash
php artisan vendor:publish --provider="Myckhel\Iaphub\IaphubServiceProvider"
```

This is the default content of the config file ```iaphub.php```:

```php
<?php
  return [
    "api_key"          => env("IAPHUB_API_KEY"),
    "app_id"           => env("IAPHUB_APP_ID"),
    "env"              => env("IAPHUB_APP_ENV"),
    "hook_token"       => env("IAPHUB_HOOK_TOKEN"),
    // this middleware will be used for IAPHUB routes
    "route_middleware" => 'iaphub_disabled', // comma separated values e.g 'auth:api,auth:web'
  ];
```
Update Your Projects `.env` with:
```
IAPHUB_API_KEY=XXXXXXXXXXXXXXXXX
IAPHUB_APP_ID=XXXXXXXXXXXXXXXXX
IAPHUB_HOOK_TOKEN=XXXXXXXXXXXXXXXXX
IAPHUB_APP_ENV=development
```
Run the database migration
```bash
php artisan migrate
```

## Available Api's
```php
<?php
use Iaphub;

Iaphub::getUser($userId, $params);
Iaphub::postUser($userId, $params);
Iaphub::postUserPricing($userId, $params);
Iaphub::postUserReceipt($userId, $params);
Iaphub::postUserPurchases($userId, $params);
Iaphub::getPurchase($purchaseId, $params);
Iaphub::getReceipt($receiptId, $params);
```

## API Usage Example
```php
<?php

namespace Myckhel\Iaphub\Http\Controllers;

use Illuminate\Routing\Controller;
use Myckhel\Iaphub\Http\Requests\IaphubRequest;
use Illuminate\Http\Request;
use Iaphub;

class IaphubController extends Controller
{
  public function getUser(IaphubRequest $request, $id){
    return Iaphub::getUser($id, $request->all());
  }
}
```

## Middleware
IAPHUB provided 2 middlewares
### `iaphub_hook_token`
For authenticating iaphub hook request
#### Example:
```php
<?php
Route::any('iaphub/hooks',  [SubscriptionController::class, 'hooks'])->middleware('iaphub_hook_token');

```
### `iaphub_disabled`
For disabling route request
returns 403 response
#### Example:
```php
<?php
Route::any('iaphub/hooks',  [SubscriptionController::class, 'hooks'])->middleware('iaphub_disabled');
/* returns {
    "message": "This Endpoint Is Disabled \n enable it by replacing the 'iaphub_disabled' middleware from your config",
  }
*/

```


## Todos
- coming soon

## Testing
Run the tests with:

``` bash
vendor/bin/phpunit
```

## Changelog
Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing
Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [myckhel](https://github.com/myckhel)
- [All Contributors](https://github.com/myckhel/laravel-iaphub/contributors)

## Security
If you discover any security-related issues, please email myckhel1@hotmail.com instead of using the issue tracker.

## License
The MIT License (MIT). Please see [License File](/LICENSE.md) for more information.
