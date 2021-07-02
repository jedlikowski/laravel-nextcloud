# laravel-nextcloud

Based on https://github.com/pascalbaljetmedia/laravel-webdav

## Install

Via Composer

```bash
$ composer require tyangjawi03/laravel-nextcloud
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
	    'objectGuid' => 'OBJECT_GUID', // optional params, used when NextCloud instance is using AD/LDAP as Authentication provider so the webDav url will be look like e.g https://example.com/remote.php/dav/files/OBJECT_GUID/
	],
	...
];
```

## Security

If you discover any security related issues, please email jakub.jedlikowski@gmail.com instead of using the issue tracker.

## Credits

-   [Jakub Jedlikowski][link-author]
-   [Pascal Baljet][link-author-2]
-   [Bashir Arrohman][link-author-3]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[link-author]: https://github.com/jedlikowski
[link-author-2]: https://github.com/pascalbaljet
[link-author-3]: https://github.com/tyangjawi03
