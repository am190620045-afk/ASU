<?php

namespace ASU\Core\Bootstrap;

use ASU\Core\Kernel\Application;

class ApplicationFactory
{
    public static function create(): Application
    {
        return new Application();
    }
}
