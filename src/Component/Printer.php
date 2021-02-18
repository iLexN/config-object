<?php

declare(strict_types=1);

namespace Ilex\ConfigObject\Component;

use Ilex\ConfigObject\Error\ClassValueObject;
use Nette\PhpGenerator\PsrPrinter;

class Printer
{

    public function __invoke(ClassValueObject $fileClass): string
    {
        $printer = new PsrPrinter;// 4 spaces indentation
        return $printer->printFile($fileClass->getFile());
    }
}
