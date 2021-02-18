<?php

namespace Ilex\ConfigObject\Tests;

use Ilex\ConfigObject\Setting;
use Ilex\ConfigObject\Tests\Fake\One;
use Ilex\ConfigObject\Tests\Fake\NotCreate;
use PHPUnit\Framework\TestCase;

class SettingTest extends TestCase
{

    public function testGetFilePath(): void
    {
        $test = new One();
        self::assertEquals('getTargetPath/getTargetClassName.php', $test->getFilePath());
    }
}
