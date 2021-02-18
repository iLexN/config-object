<?php

namespace Ilex\ConfigObject\Tests\Component;

use Ilex\ConfigObject\Component\Construst;
use Ilex\ConfigObject\Component\Printer;
use Ilex\ConfigObject\Error\ClassValueObject;
use Ilex\ConfigObject\Tests\Fake\Simple;
use PHPUnit\Framework\TestCase;

class ConstrustTest extends TestCase
{
    public function testOutput(): void
    {
        $setting = new Simple();
        $fileClass = new ClassValueObject($setting);

        $testClass = new Construst();
        $testClass($fileClass);

        $result = (new Printer())($fileClass);

        self::assertStringEqualsFile(__DIR__ . '/../Expect/construst.txt', $result);
    }
}
