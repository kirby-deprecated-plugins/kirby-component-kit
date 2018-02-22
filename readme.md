# Kirby Component Kit

[![Version 0.1](https://img.shields.io/badge/version-0.1-blue.svg)](https://github.com/jenstornell/field-engineer/blob/master/docs/changelog.md) [![Commercial license](https://img.shields.io/badge/license-commercial-red.svg)](https://github.com/jenstornell/field-engineer/blob/master/docs/license.md) [![Commercial license](https://img.shields.io/badge/price-€15-yellow.svg)](https://github.com/jenstornell/field-engineer/blob/master/docs/license.md)

Write a short description of what the plugin is about.

![Screenshot](https://placehold.it/888x150?text=Screenshot)

## Table of contents

- Get Started
  1. [Installation instructions](docs/install.md)
  1. [Usage](#usage)
- [Options](#options)
- [Changelog](docs/changelog.md)
- [Requirements](#requirements)
- [Disclaimer](#requirements)
- [License (MIT)](#requirements)
- [Credits](#requirements)

## Usage

Text, images and videos are good things to describe how to use this plugin.

## Setup

### Controller preview

In the Component Kit Tool you can preview templates and snippets. You can also use controllers but because they are bound to a page, they will only run on the site, not in the tool.

Instead you can add an additional file to your component folder called `component.preview.php`. Because it does not take `$site, $pages, $page` as arguments it will look a bit different:

```php
<?php
return [
  'foo' => 'my first template variable',
  'bar' => 'Hello from the tool'
];
```

If you are in the tool and do something like `echo $bar;` it will output the `component.preview.php` data which in this case is `Hello from the tool`. If you are on the site, it will use `controller.php` instead.

## Options

The following options can be set in your `/site/config/config.php` file:

```php
c::set('component.kit.path', 'component-kit');
c::set('component.kit.directory', kirby()->roots()->site() . DS . 'components');
c::set('component.kit.preview.css', null);
c::set('component.kit.preview.js', null);
c::set('component.kit.lock', false);
c::set('component.kit.background', null);
c::set('component.kit.margin', 0);
c::set('component.kit.tool.active', true);
```

### option1

This option is an integer, a number which can be used for calculations.

## Requirements

- [**Kirby**](https://getkirby.com/) 2.5+

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please [create a new issue](https://github.com/jenstornell/kirby-component-kit/issues/new).

## License

[MIT](https://opensource.org/licenses/MIT)

It is discouraged to use this plugin in any project that promotes racism, sexism, homophobia, animal abuse, violence or any other form of hate speech.

## Donations

If you bought a license, but want to support this project even more you can also send a donation to:

https://www.paypal.me/DevoneraAB

## Credits

- [Jens Törnell](https://github.com/jenstornell)
- [Bastian Allgeier](https://github.com/bastianallgeier) - This plugin is inspired by the [Patterns plugin](https://github.com/getkirby-plugins/patterns-plugin).