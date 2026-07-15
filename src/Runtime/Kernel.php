<?php

declare(strict_types=1);

namespace ASU\Runtime;

use ASU\Config\Loader;
use ASU\Module\Discovery;
use ASU\Module\Manager as ModuleManager;

final class Kernel
{
    private bool $booted = false;
    private Container $container;
    private ServiceManager $services;
    private ModuleManager $modules;

    public function __construct()
    {
        $this->container = new Container();
        $this->services = new ServiceManager();
        $this->modules = new ModuleManager();
    }

    public function boot(): array
    {
        $this->registerServices();
        $lifecycle = $this->services->boot();
        $this->booted = true;

        return [
            'kernel' => 'ready',
            'booted' => $this->booted,
            'lifecycle' => $lifecycle,
            'modules' => $this->discoverModules(),
            'metadata' => Metadata::get(),
            'runtime' => Bootstrap::initialize(),
        ];
    }

    public function shutdown(): void
    {
        $this->modules->shutdown();
        $this->services->shutdown();
    }

    private function registerServices(): void
    {
        $this->container->set('config', new Loader());
        $this->container->set('modules', new Discovery());

        $this->services->register('config', $this->container->get('config'));
        $this->services->register('modules', $this->container->get('modules'));
    }

    private function discoverModules(): array
    {
        return $this->container->get('modules')->scan(dirname(__DIR__, 2) . '/modules');
    }
}
