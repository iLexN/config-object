<?php

namespace Ilex\ConfigObject\Tests;

use Ilex\ConfigObject\CreateMode;
use PHPUnit\Framework\TestCase;

class ConfigModeTest extends TestCase
{
    public function testModeOne(): void
    {
        $mode = CreateMode::each();
        self::assertEquals(CreateMode::DEV, $mode->getMode());
    }

    public function testModeTwo(): void
    {
        $mode = CreateMode::oneTime();
        self::assertEquals(CreateMode::FILE_NOT_EXIST, $mode->getMode());
    }

    public function testModeThree(): void
    {
        $mode = CreateMode::notCreate();
        self::assertEquals(CreateMode::FILE_ONLY, $mode->getMode());
    }
}
