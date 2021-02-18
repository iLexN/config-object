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

    public function __construct()
    {
    }

    public function create(SettingInterface $setting): string
    {
        $fileClass = new ClassValueObject($setting);

        $this->setHeader($fileClass);
        $this->setClassProperty($fileClass);
        $this->setConstruct($fileClass);
        $this->setGetData($fileClass);

        return $this->print($fileClass);
    }

    private function setHeader(ClassValueObject $fileClass): void
    {
        $header = new Header();
        $header($fileClass);
    }

    private function setClassProperty(ClassValueObject $fileClass): void
    {
        $classProperty = new ClassProperty();
        $classProperty($fileClass);
    }

    private function setConstruct(ClassValueObject $fileClass): void
    {
        $construst = new Construst();
        $construst($fileClass);
    }

    private function setGetData(ClassValueObject $fileClass): void
    {
        $class = $fileClass->getClass();

        $method = $class->addMethod('getData');
        $method->setBody(
            'return $this->data;'
        );
    }

    private function print(ClassValueObject $fileClass): string
    {
        $printer = new Printer();
        return $printer($fileClass);
    }
}
