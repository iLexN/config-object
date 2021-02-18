<?php

declare(strict_types=1);

namespace Ilex\ConfigObject\Error;

use Ilex\ConfigObject\SettingInterface;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpFile;

class ClassValueObject
{
    private PhpFile $file;
    private ClassType $class;
    private mixed $data;

    public function __construct(
        private SettingInterface $setting,
    ) {
        $this->init();
    }

    private function init(): void
    {
        $this->file = new PhpFile;
        $namespace = $this->file->addNamespace($this->setting->getTargetNamespace());
        $this->class = $namespace->addClass($this->setting->getTargetClassName());
        $this->data = $this->setting->getData();
    }

    public function getFile(): PhpFile
    {
        return $this->file;
    }

    public function getClass(): ClassType
    {
        return $this->class;
    }

    public function getSetting(): SettingInterface
    {
        return $this->setting;
    }

    public function getData(): mixed
    {
        return $this->data;
    }
}
