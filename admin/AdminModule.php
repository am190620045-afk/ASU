<?php

namespace ASU\Admin;

use ASU\Core\Http\Router;
use ASU\Core\Modules\ModuleInterface;
use ASU\Admin\Dashboard\DashboardController;

class AdminModule implements ModuleInterface
{
    public function getName(): string
    {
        return 'admin';
    }

    public function register(): void
    {
        // Register admin services and controllers.
    }

    public function boot(): void
    {
        // Initialize admin runtime.
    }

    public function registerRoutes(Router $router): void
    {
        $router->get('/admin', function () {
            return 'Admin Dashboard';
        });
    }
}
