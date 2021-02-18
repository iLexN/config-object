<?php

declare(strict_types=1);

namespace Ilex\ConfigObject;

class CreateMode
{
    /**
     * create every time
     */
    public const DEV = 'dev';

    /**
     * create only when file not exist
     */
    public const FILE_NOT_EXIST = 'exist';

    /**
     * Not create, use file directly
     */
    public const FILE_ONLY = 'file';

    private function __construct(
        private string $mode,
    ) {
    }

    public function getMode(): string
    {
        return $this->mode;
    }

    public static function each(): static
    {
        return new static(self::DEV);
    }

    public static function oneTime(): static
    {
        return new static (self::FILE_NOT_EXIST);
    }

    public static function notCreate(): static
    {
        return new static(self::FILE_ONLY);
    }
}
