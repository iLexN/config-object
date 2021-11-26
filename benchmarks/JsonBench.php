<?php

declare(strict_types=1);

use Example\ConfigObject\GenNameCreate;
use Example\ConfigObject\GenNameCreateJson;
use Ilex\ConfigObject\CreateMode;
use Ilex\ConfigObject\GeneratorManager;
use Ilex\ConfigObject\Setting;
use Ilex\ConfigObject\Tests\Fake\One;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

class JsonBenchmark
{

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchBase(): void{
        $json = file_get_contents(__DIR__.'/sample.json');
        $json = \json_decode($json, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchEach(): void
    {
        $mode = CreateMode::each();
        $generator = new \Ilex\ConfigObject\Generator();

        $manager = new GeneratorManager($mode, $generator);
        $manager->generate($this->getClass());
        $g = new GenNameCreateJson();
        //var_dump($g->getData()->getTargetPath());
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchOnce(): void
    {
        $mode = CreateMode::oneTime();
        $generator = new \Ilex\ConfigObject\Generator();

        $manager = new GeneratorManager($mode, $generator);
        $manager->generate($this->getClass());
        $g = new GenNameCreateJson();
        //var_dump($g->getData()->getTargetPath());
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchNone(): void
    {
        $mode = CreateMode::notCreate();
        $generator = new \Ilex\ConfigObject\Generator();

        $manager = new GeneratorManager($mode, $generator);
        $manager->generate($this->getClass());
        $g = new GenNameCreateJson();
        //var_dump($g->getData()->getTargetPath());
    }



    public function getClass(): Setting
    {
        $setting = new class extends Setting {

            public function getTargetPath(): string
            {
                return __DIR__ . '/../example';
            }

            public function getTargetNamespace(): string
            {
                return 'Example\ConfigObject';
            }

            public function getTargetClassName(): string
            {
                return 'GenNameCreateJson';
            }

            public function getData(): array
            {
                $json = file_get_contents(__DIR__.'/sample.json');

                return \json_decode($json, true, 512, JSON_THROW_ON_ERROR);
            }

            public function allowClass(): array
            {
                return [];
            }
        };
        return $setting;
    }
}
