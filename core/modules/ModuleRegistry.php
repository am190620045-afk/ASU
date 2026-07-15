<?php

namespace ASU\Core\Modules;

class ModuleRegistry
{
    private array $modules = [];

    public function add(ModuleInterface $module): void
    {
        $this->modules[$module->getName()] = $module;
    }

    public function get(string $name): ?ModuleInterface
    {
        return $this->modules[$name] ?? null;
    }

    public function all(): array
    {
        return $this->modules;
    }
}
