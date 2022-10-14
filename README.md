# Upmind Provision Providers - Hello World

[![Latest Version on Packagist](https://img.shields.io/packagist/v/upmind/provision-provider-hello-world.svg?style=flat-square)](https://packagist.org/packages/upmind/provision-provider-hello-world)

This package is a basic 'Hello World' example of a Provision Category and Providers.

- [Installation](#installation)
- [Usage](#usage)
  - [Quick-start](#quick-start)
- [Supported Providers](#supported-providers)
- [Functions](#functions)
  - [greeting()](#greeting)
- [Changelog](#changelog)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)
- [Upmind](#upmind)

## Installation

```bash
composer require upmind/provision-provider-hello-world
```

## Usage

This library makes use of [upmind/provision-provider-base](https://packagist.org/packages/upmind/provision-provider-base) primitives which we suggest you familiarize yourself with by reading the usage section in the README.

### Quick-start

See the below example to generat a greeting:

```php
<?php

use Illuminate\Support\Facades\App;
use Upmind\ProvisionBase\ProviderFactory;

$configuration = [
    'api_key' => 'example',
    'api_secret' => 'shhh!',
];

$factory = App::make(ProviderFactory::class);
$provider = $factory->create('hello-world', 'hello-foo', $configuration);

$createParameters = [
    'name' => 'Harry',
];
$function = $provider->makeJob('greeting', $createParameters);

$greetingResult = $function->execute();

if ($greetingResult->isError()) {
    throw new RuntimeException($greetingResult->getMessage(), 0, $greetingResult->getException());
}

/** @var \Upmind\ProvisionProviders\HelloWorld\Data\Greeting */
$greeting = $greetingResult->getData();

// $greeting->sentence; // Hello Harry! From your friend, Foo.
// ...
```

## Supported Providers

The following providers are currently implemented:
  - Hello Foo
  - Hello Bar

## Functions

### greeting()

Greet a person by name.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

 - [Harry Lewis](https://github.com/uphlewis)
 - [All Contributors](../../contributors)

## License

GNU General Public License version 3 (GPLv3). Please see [License File](LICENSE.md) for more information.

## Upmind

Sell, manage and support web hosting, domain names, ssl certificates, website builders and more with [Upmind.com](https://upmind.com/start) - the ultimate web hosting billing and management solution.