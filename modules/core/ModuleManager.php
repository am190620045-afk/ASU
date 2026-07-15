<?php

namespace ASU\Modules\Core;

use ASU\Modules\Contracts\ModuleInterface;
use ASU\Modules\Registry\ModuleRegistry;

class ModuleManager
{
    private array $modules = [];
    private ModuleRegistry $registry;

    public function __construct()
    {
        $this->registry = new ModuleRegistry();
    }

    public function register(ModuleInterface $module): void
    {
        $name = $module->getName();

        $this->modules[$name] = $module;
        $this->registry->add($name);
        $module->register();
    }

    public function boot(): void
    {
        foreach ($this->modules as $module) {
            $module->boot();
        }
    }

    public function registry(): ModuleRegistry
    {
        return $this->registry;
    }
}
