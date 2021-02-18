<?php

namespace Ilex\ConfigObject\Tests;

use Ilex\ConfigObject\Generator;
use Ilex\ConfigObject\Tests\Fake\Simple;
use PHPUnit\Framework\TestCase;

class GeneratorTest extends TestCase
{
    public function testRun(): void
    {
        $setting = new Simple();
        $generator = new Generator();
        $result = $generator->create($setting);

        self::assertStringEqualsFile(__DIR__ . '/Expect/simple.txt', $result);

    }
}
