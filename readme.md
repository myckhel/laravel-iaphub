# Iaphub

[![Latest Version on Packagist](https://img.shields.io/packagist/v/myckhel/laravel-iaphub.svg?style=flat-square)](https://packagist.org/packages/myckhel/laravel-iaphub)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Travis](https://img.shields.io/travis/myckhel/laravel-iaphub.svg?style=flat-square)]()
[![Total Downloads](https://img.shields.io/packagist/dt/myckhel/laravel-iaphub.svg?style=flat-square)](https://packagist.org/packages/myckhel/laravel-iaphub)

## [Iaphub Doc Link](https://iaphub.com/docs)

## Install
Via Composer
`$ composer require myckhel/laravel-iaphub`

## Setup
The package will automatically register a service provider.

You need to publish the configuration file:

```php artisan vendor:publish --provider="Myckhel\Iaphub\IaphubServiceProvider"```

This is the default content of the config file ```Iaphub.php```:

```<?php

return [

];
```
Update Your Projects `.env` with:
```

```
Run the database migration
`php artisan migrate`

## Available Api's
```
use Iaphub;

```

## API Usage Example


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
