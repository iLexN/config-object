<?php

declare(strict_types=1);

namespace Ilex\ConfigObject\Component;

use Ilex\ConfigObject\Error\ClassValueObject;

final class Header
{
    /**
     * @var string
     */
    private const FILE_COMMENT = 'This file is auto-generated.';

    public function __invoke(ClassValueObject $classValueObject): void
    {
        $file = $classValueObject->getFile();
        $file->addComment(self::FILE_COMMENT);
        $file->setStrictTypes();
    }
}
