<?php

declare(strict_types=1);

namespace Ilex\ConfigObject;

interface SettingInterface
{
    public function getTargetPath(): string;

    public function getTargetNamespace(): string;

    public function getTargetClassName(): string;

    public function getData(): mixed;

    /**
     * @return array<string>
     */
    public function allowClass(): array;

    public function getFilePath(): string;

}
