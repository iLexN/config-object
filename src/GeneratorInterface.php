<?php

declare(strict_types=1);

namespace Ilex\ConfigObject;

interface GeneratorInterface
{
    public function create(SettingInterface $setting): string;
}
