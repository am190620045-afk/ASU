<?php

namespace ASU\Core\Modules;

class ModuleManager
{
    public function __construct(
        private ModuleRegistry $registry = new ModuleRegistry()
    ) {
    }

    public function registerModule(ModuleInterface $module): void
    {
        $this->registry->add($module);
        $module->register();
    }

    public function boot(): void
    {
        foreach ($this->registry->all() as $module) {
            $module->boot();
        }
    }

    public function modules(): ModuleRegistry
    {
        return $this->registry;
    }
}
