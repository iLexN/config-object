<?php

declare(strict_types=1);

namespace Ilex\ConfigObject;

use Ilex\ConfigObject\Component\ClassProperty;
use Ilex\ConfigObject\Component\Construst;
use Ilex\ConfigObject\Component\Header;
use Ilex\ConfigObject\Component\Printer;
use Ilex\ConfigObject\Error\ClassValueObject;

final class Generator implements GeneratorInterface
{

    public function create(SettingInterface $setting): string
    {
        $classValueObject = new ClassValueObject($setting);

        $this->setHeader($classValueObject);
        $this->setClassProperty($classValueObject);
        $this->setConstruct($classValueObject);
        $this->setGetData($classValueObject);

        return $this->print($classValueObject);
    }

    private function setHeader(ClassValueObject $classValueObject): void
    {
        $header = new Header();
        $header($classValueObject);
    }

    private function setClassProperty(ClassValueObject $classValueObject): void
    {
        $classProperty = new ClassProperty();
        $classProperty($classValueObject);
    }

    private function setConstruct(ClassValueObject $classValueObject): void
    {
        $construst = new Construst();
        $construst($classValueObject);
    }

    private function setGetData(ClassValueObject $classValueObject): void
    {
        $class = $classValueObject->getClass();

        $method = $class->addMethod('getData');
        $method->setBody(
            'return $this->data;'
        );
    }

    private function print(ClassValueObject $classValueObject): string
    {
        $printer = new Printer();
        return $printer($classValueObject);
    }
}
