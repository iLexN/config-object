<?php

declare(strict_types=1);

namespace Ilex\ConfigObject\Tests\Fake;

use Ilex\ConfigObject\Setting;

class Each extends Setting
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
        return 'Each';
    }

    public function getData(): int
    {
        return 1;
    }

    public function allowClass(): array
    {
        return [One::class];
    }
}
