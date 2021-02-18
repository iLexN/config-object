<?php

declare(strict_types=1);

namespace Ilex\ConfigObject\Component;

use Ilex\ConfigObject\Error\ClassValueObject;

final class Construst
{

    public function __invoke(ClassValueObject $classValueObject): void
    {
        $class = $classValueObject->getClass();
        $setting = $classValueObject->getSetting();

        $method = $class->addMethod('__construct');

        $allowClass = var_export($setting->allowClass(), true);
        $serialize = serialize($classValueObject->getData());

        $method->setBody(
            '$this->data = \unserialize(\'' . $serialize . '\',["allowed_classes" => ' . $allowClass . ']);'
        );
    }
}
