<?php

namespace ASU\Core\Bootstrap;

use ASU\Core\Kernel\Application;

class Bootstrap
{
    public static function initialize(): Application
    {
        require_once dirname(__DIR__, 2) . '/autoload.php';

        return new Application();
    }
}
