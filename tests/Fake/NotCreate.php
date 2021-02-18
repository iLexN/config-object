<?php

declare(strict_types=1);

namespace Ilex\ConfigObject\Tests\Fake;

use Ilex\ConfigObject\Setting;

class NotCreate extends Setting
{

    public function getTargetPath(): string
    {
        return __DIR__ . '/../example';
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
}
