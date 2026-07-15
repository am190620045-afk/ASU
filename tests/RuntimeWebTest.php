<?php

namespace ASU\Tests;

use ASU\Core\Http\Router;
use ASU\Core\Kernel\Application;

class RuntimeWebTest
{
    public function run(): array
    {
        $app = new Application();
        $app->run();

        $dashboard = $app->services()->get('dashboard');

        $router = new Router();

        $routes = require dirname(__DIR__) . '/admin/routes.php';
        $routes($router, $dashboard);

        return [
            'application' => $app instanceof Application,
            'dashboard' => $dashboard !== null,
            'admin_route' => $router->dispatch('GET', '/admin') !== null,
        ];
    }
}
