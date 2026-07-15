<?php

namespace ASU\Core\Modules;

use ASU\Core\Http\Router;

class ModuleRouteBootstrap
{
    public function register(ModuleRegistry $registry, Router $router): void
    {
        foreach ($registry->all() as $module) {
            $module->registerRoutes($router);
        }
    }
}
