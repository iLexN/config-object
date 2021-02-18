<?php

declare(strict_types=1);

namespace Ilex\ConfigObject\Error;

final class ConfigBuilderError extends \Exception
{

    public static function FileNotFound(string $path): self
    {
        $msg = 'File not found in `' . $path . '`';
        return new self(message: $msg);
    }
}
