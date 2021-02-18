<?php

declare(strict_types=1);

namespace Ilex\ConfigObject;

abstract class Setting implements SettingInterface
{
    private const FILE_EXT = '.php';

    abstract public function getTargetPath(): string;

    abstract public function getTargetNamespace(): string;

    abstract public function getTargetClassName(): string;

    abstract public function getData(): mixed;

    abstract public function allowClass(): array;

    public function getFilePath(): string
    {
        return $this->getTargetPath() . '/' . $this->getTargetClassName() . self::FILE_EXT;
    }
}
