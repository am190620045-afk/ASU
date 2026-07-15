<?php

namespace ASU\Core\Bootstrap;

use ASU\Core\Kernel\Application;

class Bootstrap
{
    public static function initialize(): Application
    {
        return new Application();
    }
}
