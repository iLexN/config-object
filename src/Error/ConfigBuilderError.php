<?php

declare(strict_types=1);

namespace Ilex\ConfigObject\Error;

class ConfigBuilderError extends \Exception
{

    public static function FileNotFound(string $path): static
    {
        $msg = 'File not found in `' . $path . '`';
        return new static(message: $msg);
    }
}
