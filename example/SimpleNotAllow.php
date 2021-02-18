<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace Example\ConfigObject;

class SimpleNotAllow
{
    private mixed $data;

    public function __construct()
    {
        $this->data = \unserialize('a:2:{s:1:"a";i:1;s:1:"b";O:32:"Ilex\ConfigObject\Tests\Fake\One":0:{}}',["allowed_classes" => array (
        )]);
    }

    public function getData()
    {
        return $this->data;
    }
}
