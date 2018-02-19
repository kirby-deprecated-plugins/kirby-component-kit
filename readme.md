# Kirby Component Kit

![Version](https://img.shields.io/badge/version-0.1-green.svg) ![License](https://img.shields.io/badge/license-MIT-green.svg) ![Kirby Version](https://img.shields.io/badge/Kirby-2.0%2B-red.svg)

*Version 0.1*

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

## Options

The following options can be set in your `/site/config/config.php` file:

```php
c::set('component.kit.path', 'component-kit');
c::set('component.kit.directory', kirby()->roots()->site() . DS . 'components');
c::set('component.kit.preview.css', null);
c::set('component.kit.preview.js', null);
c::set('component.kit.lock', false);
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

## Credits

- [Jens Törnell](https://github.com/jenstornell)
- [Bastian Allgeier](https://github.com/bastianallgeier) - This plugin is inspired by the [Patterns plugin](https://github.com/getkirby-plugins/patterns-plugin).