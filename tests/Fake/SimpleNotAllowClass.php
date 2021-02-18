<?php

declare(strict_types=1);

namespace Ilex\ConfigObject\Tests\Fake;

use Ilex\ConfigObject\Setting;

class SimpleNotAllowClass extends Setting
{

    public function getTargetPath(): string
    {
        return __DIR__ . '/../../example';
    }

    public function getTargetNamespace(): string
    {
        return 'Example\ConfigObject';
    }

    public function getTargetClassName(): string
    {
        return 'SimpleNotAllow';
    }

    public function getData(): array
    {
        return [
            'a' => 1,
            'b' => true,
            'c' => new One(),
        ];
    }

    public function allowClass(): array
    {
        return [];
    }
}
