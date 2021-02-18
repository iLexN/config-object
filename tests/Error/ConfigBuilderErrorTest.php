<?php

namespace Ilex\ConfigObject\Tests\Error;

use Ilex\ConfigObject\Error\ConfigBuilderError;
use PHPUnit\Framework\TestCase;

class ConfigBuilderErrorTest extends TestCase
{
    public function testFileNotFine(): void
    {
        $error = ConfigBuilderError::FileNotFound(path: 'a');
        self::assertEquals('File not found in `a`', $error->getMessage());
    }
}
