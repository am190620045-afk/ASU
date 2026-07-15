<?php

namespace ASU\Core\Kernel;

use ASU\Core\Config\ConfigLoader;
use ASU\Core\Services\ServiceContainer;
use ASU\Modules\Core\ModuleManager;

class Application
{
    private ServiceContainer $container;
    private ModuleManager $modules;

    public function __construct()
    {
        $this->container = new ServiceContainer();
        $this->modules = new ModuleManager();
    }

    public function run(): void
    {
        $this->container->register('config', new ConfigLoader());
        $this->container->register('modules', $this->modules);

        $this->modules->boot();
    }
}
