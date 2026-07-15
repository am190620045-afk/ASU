<?php

namespace ASU\Modules\Core;

use ASU\Modules\Contracts\ModuleInterface;

class ModuleManager
{
    private array $modules = [];

    public function register(ModuleInterface $module): void
    {
        $this->modules[$module->getName()] = $module;
        $module->register();
    }

    public function boot(): void
    {
        foreach ($this->modules as $module) {
            $module->boot();
        }
    }
}
