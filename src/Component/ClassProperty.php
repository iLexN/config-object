<?php

declare(strict_types=1);

namespace Ilex\ConfigObject\Component;

use Ilex\ConfigObject\Error\ClassValueObject;

class ClassProperty
{
    private const DATA_PROPERTY = 'data';
    private const DATA_PROPERTY_TYPE = 'mixed';

    public function __invoke(ClassValueObject $fileClass): void
    {
        $class = $fileClass->getClass();
        $class->addProperty(self::DATA_PROPERTY)
            ->setType(self::DATA_PROPERTY_TYPE)
            ->setPrivate();
    }
}
