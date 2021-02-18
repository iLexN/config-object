<?php

declare(strict_types=1);

namespace Ilex\ConfigObject\Component;

use Ilex\ConfigObject\Error\ClassValueObject;

final class ClassProperty
{
    /**
     * @var string
     */
    private const DATA_PROPERTY = 'data';
    /**
     * @var string
     */
    private const DATA_PROPERTY_TYPE = 'mixed';

    public function __invoke(ClassValueObject $classValueObject): void
    {
        $classType = $classValueObject->getClass();
        $classType->addProperty(self::DATA_PROPERTY)
            ->setType(self::DATA_PROPERTY_TYPE)
            ->setPrivate();
    }
}
