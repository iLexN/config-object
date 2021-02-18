# config-object
> Simple Object to build graphql payload, and use your favourite http client to send.

[![Latest Stable Version](https://poser.pugx.org/ilexn/config-object/v/stable)](https://packagist.org/packages/ilexn/config-object)
[![Total Downloads](https://poser.pugx.org/ilexn/config-object/downloads)](https://packagist.org/packages/ilexn/config-object)

![GitHub Action](https://github.com/iLexN/config-object/workflows/CI%20Check/badge.svg)
[![Coverage Status](https://coveralls.io/repos/github/iLexN/config-object/badge.svg?branch=master)](https://coveralls.io/github/iLexN/config-object?branch=master)
[![Infection MSI](https://badge.stryker-mutator.io/github.com/iLexN/config-object/master)](https://infection.github.io)

## Installation
```sh
composer require ilexn/config-object
```

## Usage example
```php
<?php

declare(strict_types=1);

use Example\ConfigObject\GenNameCreate;
use Ilex\ConfigObject\CreateMode;
use Ilex\ConfigObject\GeneratorManager;
use Ilex\ConfigObject\Setting;
use Ilex\ConfigObject\Tests\Fake\One;

include 'vendor/autoload.php';

$setting = new class extends Setting {

    public function getTargetPath(): string
    {
        return __DIR__ . '/example';
    }

    public function getTargetNamespace(): string
    {
        return 'Example\ConfigObject';
    }

    public function getTargetClassName(): string
    {
        return 'GenNameCreate';
    }

    public function getData(): One
    {
        return new One();
    }

    public function allowClass(): array
    {
        return [One::class];
    }
};


$mode = CreateMode::each();
$generator = new \Ilex\ConfigObject\Generator();

$manager = new GeneratorManager($mode, $generator);
$manager->generate($setting);

$g = new GenNameCreate();
var_dump($g->getData()->getTargetPath());
```
