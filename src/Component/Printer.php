<?php

declare(strict_types=1);

namespace Ilex\ConfigObject\Component;

use Ilex\ConfigObject\Error\ClassValueObject;
use Nette\PhpGenerator\PsrPrinter;

final class Printer
{

    public function __invoke(ClassValueObject $classValueObject): string
    {
        $psrPrinter = new PsrPrinter;// 4 spaces indentation
        return $psrPrinter->printFile($classValueObject->getFile());
    }
}
