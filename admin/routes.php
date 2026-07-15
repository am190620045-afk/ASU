<?php

use ASU\Admin\Dashboard\DashboardController;
use ASU\Core\Http\Router;

return function (Router $router, DashboardController $dashboard): void {
    $router->get('/admin', function () use ($dashboard) {
        return $dashboard->index();
    });
};
