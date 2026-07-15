<?php

namespace ASU\Core\Modules;

use ASU\Core\Http\Router;

interface ModuleInterface
{
    public function getName(): string;

    public function register(): void;

    public function boot(): void;

    public function registerRoutes(Router $router): void;
}
