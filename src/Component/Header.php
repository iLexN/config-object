<?php

declare(strict_types=1);

namespace Ilex\ConfigObject\Component;

use Ilex\ConfigObject\Error\ClassValueObject;

class Header
{
    private const FILE_COMMENT = 'This file is auto-generated.';

    public function __invoke(ClassValueObject $fileClass): void
    {
        $file = $fileClass->getFile();
        $file->addComment(self::FILE_COMMENT);
        $file->setStrictTypes();
    }
}
