<?php

declare(strict_types=1);

namespace Ilex\ConfigObject;

enum CreateMode
{
    case Dev;
    case FileNotExist;
    case FileOnly;

    public static function each(): self
    {
        return self::Dev;
    }

    public static function oneTime(): self
    {
        return self::FileNotExist;
    }

    public static function notCreate(): self
    {
        return self::FileOnly;
    }
}
