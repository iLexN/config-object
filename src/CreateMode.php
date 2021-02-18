<?php

declare(strict_types=1);

namespace Ilex\ConfigObject;

final class CreateMode
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

    public static function each(): self
    {
        return new self(self::DEV);
    }

    public static function oneTime(): self
    {
        return new self (self::FILE_NOT_EXIST);
    }

    public static function notCreate(): self
    {
        return new self(self::FILE_ONLY);
    }
}
