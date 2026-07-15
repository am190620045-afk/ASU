<?php

namespace ASU\Core\Kernel;

use ASU\Core\Config\ConfigLoader;
use ASU\Core\Services\ServiceContainer;
use ASU\Core\Services\DatabaseService;
use ASU\Core\Services\SecurityService;
use ASU\Database\Connection\Database;
use ASU\Modules\Core\ModuleManager;
use ASU\Security\Auth\Authentication;

class Application
{
    private ServiceContainer $container;
    private ModuleManager $modules;
    private ConfigLoader $config;

    public function __construct()
    {
        $this->container = new ServiceContainer();
        $this->modules = new ModuleManager();
        $this->config = new ConfigLoader();
    }

    public function run(): void
    {
        $this->config->load(dirname(__DIR__, 2) . '/config/app.config.ini');

        $this->container->register('config', $this->config);
        $this->container->register('database', new DatabaseService(new Database()));
        $this->container->register('security', new SecurityService(new Authentication()));
        $this->container->register('modules', $this->modules);

        $this->modules->boot();
    }

    public function services(): ServiceContainer
    {
        return $this->container;
    }

    public function config(): ConfigLoader
    {
        return $this->config;
    }
}
