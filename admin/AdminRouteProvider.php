<?php

namespace ASU\Admin;

use ASU\Admin\Dashboard\DashboardController;
use ASU\Core\Http\RouteProvider;
use ASU\Core\Http\Router;

class AdminRouteProvider implements RouteProvider
{
    public function __construct(
        private DashboardController $dashboard
    ) {
    }

    public function register(Router $router): void
    {
        $router->get('/admin', function () {
            return $this->dashboard->index();
        });
    }
}
