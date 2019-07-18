# laravel-nextcloud

Based on https://github.com/pascalbaljetmedia/laravel-webdav

## Install

Via Composer

```bash
$ composer require jedlikowski/laravel-nextcloud
```

## Usage

Register the service provider in your app.php config file:

```php
// config/app.php

'providers' => [
    ...
    Jedlikowski\NextCloudStorage\NextCloudServiceProvider::class
    ...
];
```

Create a NextCloud filesystem disk:

```php
// config/filesystems.php

'disks' => [
	...
	'nextcloud' => [
	    'driver'     => 'nextcloud',
	    'baseUri'    => 'https://mywebdavstorage.com',
	    'userName'   => 'johndoe',
	    'password'   => 'secret',
	    'pathPrefix' => '', // provide a subfolder name if your NextCloud instance isn't running directly on a domain, e.g. https://example.com/drive
	],
	...
];
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email jakub.jedlikowski@gmail.com instead of using the issue tracker.

## Credits

-   [Pascal Baljet][link-author]
-   [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/pbmedia/laravel-webdav.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pbmedia/laravel-webdav.svg?style=flat-square
[link-packagist]: https://packagist.org/packages/pbmedia/laravel-webdav
[link-downloads]: https://packagist.org/packages/pbmedia/laravel-webdav
[link-author]: https://github.com/jedlikowski
[link-contributors]: ../../contributors
