<?php

declare(strict_types=1);

namespace Ilex\ConfigObject;

enum CreateMode
{
    case DEV;
    case FILE_NOT_EXIST;
    case FILE_ONLY;

    public static function each(): self
    {
        return self::DEV;
    }

    public static function oneTime(): self
    {
        return self::FILE_NOT_EXIST;
    }

    public static function notCreate(): self
    {
        return self::FILE_ONLY;
    }
}
