<?php

declare(strict_types=1);

namespace ASU\Module;

final class Manager
{
    private array $modules = [];

    public function register(string $name, Contract $module): void
    {
        $this->modules[$name] = $module;
        $module->register();
    }

    public function loadManifest(string $directory): array
    {
        $loader = new Loader();
        $manifest = $loader->load($directory);

        if (($manifest['enabled'] ?? false) === true) {
            $this->modules[$manifest['name']] = $manifest;
        }

        return $manifest;
    }

    public function boot(): array
    {
        foreach ($this->modules as $module) {
            if ($module instanceof Contract) {
                $module->boot();
            }
        }

        return array_keys($this->modules);
    }

    public function shutdown(): void
    {
        foreach ($this->modules as $module) {
            if ($module instanceof Contract) {
                $module->shutdown();
            }
        }
    }
}
