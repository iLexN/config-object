# config-object
> Generator for create data value object.

[![Latest Stable Version](https://poser.pugx.org/ilexn/config-object/v/stable)](https://packagist.org/packages/ilexn/config-object)
[![Total Downloads](https://poser.pugx.org/ilexn/config-object/downloads)](https://packagist.org/packages/ilexn/config-object)

![GitHub Action](https://github.com/iLexN/config-object/workflows/CI%20Check/badge.svg)
[![Coverage Status](https://coveralls.io/repos/github/iLexN/config-object/badge.svg?branch=main)](https://coveralls.io/github/iLexN/config-object?branch=main)
[![Infection MSI](https://badge.stryker-mutator.io/github.com/iLexN/config-object/main)](https://infection.github.io)

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

## Benchmark


| benchmark     | subject   | set | revs | its | mem_peak | mode      | rstdev |
|---------------|-----------|-----|------|-----|----------|-----------|--------|
| JsonBenchmark | benchBase | 0   | 1000 | 5   | 2.417mb  | 25.600μs  | ±1.27% |
| JsonBenchmark | benchEach | 0   | 1000 | 5   | 5.216mb  | 287.363μs | ±0.73% |
| JsonBenchmark | benchOnce | 0   | 1000 | 5   | 2.417mb  | 5.764μs   | ±2.15% |
| JsonBenchmark | benchNone | 0   | 1000 | 5   | 2.417mb  | 1.923μs   | ±3.01% |


## Todo
[ ] add general method.
