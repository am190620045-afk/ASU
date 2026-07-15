<?php

declare(strict_types=1);

namespace ASU\Runtime;

use ASU\Config\Loader;
use ASU\Module\Bootstrap as ModuleBootstrap;
use ASU\Module\Discovery;
use ASU\Module\Manager as ModuleManager;
use ASU\Module\Registry;

final class Kernel
{
    private bool $booted = false;
    private Container $container;
    private ServiceManager $services;
    private ModuleManager $modules;
    private Registry $registry;
    private State $state;
    private Persistence $persistence;

    public function __construct()
    {
        $this->container = new Container();
        $this->services = new ServiceManager();
        $this->modules = new ModuleManager();
        $this->registry = new Registry();
        $this->state = new State();
        $this->persistence = new Persistence(dirname(__DIR__, 2) . '/runtime-state.json');
    }

    public function boot(): array
    {
        $this->registerServices();
        $this->state->set('started_at', time());
        $this->state->set('restored', $this->persistence->load());

        $lifecycle = $this->services->boot();
        $modules = $this->bootstrapModules();
        $this->booted = true;

        return [
            'kernel' => 'ready',
            'booted' => $this->booted,
            'lifecycle' => $lifecycle,
            'modules' => $modules,
            'state' => $this->state->all(),
            'metadata' => Metadata::get(),
            'runtime' => Bootstrap::initialize(),
        ];
    }

    public function shutdown(): void
    {
        $this->persistence->save($this->state->all());
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

    private function bootstrapModules(): array
    {
        $bootstrap = new ModuleBootstrap();

        return $bootstrap->initialize(
            dirname(__DIR__, 2) . '/modules',
            $this->registry
        );
    }
}
