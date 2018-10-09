# Laravel Factory CLI

[![Total Downloads](https://poser.pugx.org/leon0399/laravel-factory-cli/downloads)](https://packagist.org/packages/leon0399/laravel-factory-cli)
[![Latest Stable Version](https://poser.pugx.org/leon0399/laravel-factory-cli/v/stable)](https://packagist.org/packages/leon0399/laravel-factory-cli)
[![Latest Unstable Version](https://poser.pugx.org/leon0399/laravel-factory-cli/v/unstable)](https://packagist.org/packages/leon0399/laravel-factory-cli)
[![License](https://poser.pugx.org/leon0399/laravel-factory-cli/license)](https://packagist.org/packages/leon0399/laravel-factory-cli)

Command line interface for Factories. No more Tinker!

## Installation

Install the latest version with

```bash
$ composer require --dev leon0399/laravel-factory-cli
```

## Usage

To create a single instance of class:

```bash
$ php artisan factory:create App/User
```

Or you can omit the namespace:

```bash
$ php artisan factory:create User
```

To create multiple instances of class, use `-a`:

```bash
$ php artisan factory:create User -a 10
```

## License

    MIT License

    Copyright (c) 2018 Leonid Meleshin

    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in all
    copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
    SOFTWARE.
