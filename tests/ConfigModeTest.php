<?php

namespace Ilex\ConfigObject\Tests;

use Ilex\ConfigObject\CreateMode;
use PHPUnit\Framework\TestCase;

class ConfigModeTest extends TestCase
{
    public function testModeOne(): void
    {
        $mode = CreateMode::each();
        self::assertEquals(CreateMode::Dev, $mode);
    }

    public function testModeTwo(): void
    {
        $mode = CreateMode::oneTime();
        self::assertEquals(CreateMode::FileNotExist, $mode);
    }

    public function testModeThree(): void
    {
        $mode = CreateMode::notCreate();
        self::assertEquals(CreateMode::FileOnly, $mode);
    }
}
