<?php

namespace ASU\Admin;

use ASU\Modules\Contracts\ModuleInterface;

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
}
