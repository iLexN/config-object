<?php

namespace Ilex\ConfigObject\Tests;

use Example\ConfigObject\SimpleNotAllow;
use Ilex\ConfigObject\CreateMode;
use Ilex\ConfigObject\Generator;
use Ilex\ConfigObject\GeneratorInterface;
use Ilex\ConfigObject\GeneratorManager;
use Ilex\ConfigObject\Tests\Fake\Each;
use Ilex\ConfigObject\Tests\Fake\NotCreate;
use Ilex\ConfigObject\Tests\Fake\Once;

use Ilex\ConfigObject\Tests\Fake\Once2;
use Ilex\ConfigObject\Tests\Fake\SimpleNotAllowClass;
use PHPUnit\Framework\TestCase;

class GeneratorManagerTest extends TestCase
{
    protected function tearDown(): void
    {
        $once = new Once();
        $each = new Each();
        $notAllow = new SimpleNotAllowClass();
        if (file_exists($once->getFilePath())) {
            unlink($once->getFilePath());
        }
        if (file_exists($each->getFilePath())) {
            unlink($each->getFilePath());
        }
    }

    public function testCreate(): void
    {
        $mode = CreateMode::each();
        $generator = new Generator();
        $manager = new GeneratorManager($mode, $generator);
        $this->expectNotToPerformAssertions();
    }

    public function testGenerateModeNotCreate(): void
    {
        $mode = CreateMode::notCreate();
        $generator = new Generator();
        $notCreate = new NotCreate();

        //make sure file not exist before create
        self::assertFileDoesNotExist($notCreate->getFilePath());

        $manager = new GeneratorManager($mode, $generator);
        $manager->generate($notCreate);

        self::assertFileDoesNotExist($notCreate->getFilePath());
    }

    public function testGenerateModeOnce(): void
    {
        $mode = CreateMode::oneTime();
        $generator = new Generator();
        $once = new Once();

        //make sure file not exist before create
        self::assertFileDoesNotExist($once->getFilePath());

        $manager = new GeneratorManager($mode, $generator);
        $manager->generate($once);
        self::assertFileExists($once->getFilePath());

        $test = new \Example\ConfigObject\Once();
        self::assertClassHasAttribute('data', $test::class);

        $once = new Once2();
        $manager->generate($once);
        $test = new \Example\ConfigObject\Once();
        self::assertEquals(1, $test->getData());
    }

    public function testGenerateModeEach(): void
    {
        $mode = CreateMode::each();
        $generator = new Generator();
        $each = new Each();

        //make sure file not exist before create
        self::assertFileDoesNotExist($each->getFilePath());

        $manager = new GeneratorManager($mode, $generator);
        $manager->generate($each);
        self::assertFileExists($each->getFilePath());
    }

    public function testGeneratorNotCreateMock(): void
    {
        $mode = CreateMode::notCreate();
        $generator = $this->createMock(GeneratorInterface::class);
        $generator->expects(self::never())
            ->method('create');

        $once = new Once();

        $manager = new GeneratorManager($mode, $generator);
        $manager->generate($once);
    }

    public function testGeneratorOnceMock(): void
    {
        $mode = CreateMode::oneTime();
        $generator = $this->createMock(GeneratorInterface::class);
        $generator->expects(self::once())
            ->method('create');

        $once = new Once();

        $manager = new GeneratorManager($mode, $generator);
        $manager->generate($once);

        $manager->generate($once);
    }

    public function testGeneratorEachMock(): void
    {
        $mode = CreateMode::each();
        $generator = $this->createMock(GeneratorInterface::class);
        $generator->expects(self::exactly(3))
            ->method('create');

        $once = new Once();

        $manager = new GeneratorManager($mode, $generator);
        $manager->generate($once);
        $manager->generate($once);
        $manager->generate($once);
    }

    public function testNotAllowClass(): void
    {
        $mode = CreateMode::oneTime();
        $generator = new Generator();
        $notAllow = new SimpleNotAllowClass();

        //make sure file not exist before create
        self::assertFileDoesNotExist($notAllow->getFilePath());

        $manager = new GeneratorManager($mode, $generator);
        $manager->generate($notAllow);

        $class = new SimpleNotAllow();
        $r = $class->getData()['b']->getTargetPath();
    }
}
