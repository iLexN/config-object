<?php

declare(strict_types=1);

namespace Ilex\ConfigObject\Tests\Fake;

use Ilex\ConfigObject\Setting;

class One extends Setting
{

    public function getTargetPath(): string
    {
        return 'getTargetPath';
    }

    public function getTargetNamespace(): string
    {
        return 'getTargetNamespace';
    }

    public function getTargetClassName(): string
    {
        return 'getTargetClassName';
    }

    public function getData(): array
    {
        return ['a' => 1];
    }

    public function allowClass(): array
    {
        return [];
    }
}
