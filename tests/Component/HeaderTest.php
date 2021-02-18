<?php

namespace Ilex\ConfigObject\Tests\Component;

use Ilex\ConfigObject\Component\Header;
use Ilex\ConfigObject\Component\Printer;
use Ilex\ConfigObject\Error\ClassValueObject;
use Ilex\ConfigObject\Tests\Fake\Simple;
use PHPUnit\Framework\TestCase;

class HeaderTest extends TestCase
{
    public function testOutput(): void
    {
        $setting = new Simple();
        $fileClass = new ClassValueObject($setting);

        $testClass = new Header();
        $testClass($fileClass);

        $result = (new Printer())($fileClass);

        self::assertStringEqualsFile(__DIR__ . '/../Expect/header.txt', $result);
    }
}
