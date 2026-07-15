<?php

declare(strict_types=1);

namespace ASU\Module;

final class Registry
{
    private array $modules = [];

    public function add(array $manifest): void
    {
        if (!isset($manifest['name'])) {
            return;
        }

        $this->modules[$manifest['name']] = $manifest;
    }

    public function all(): array
    {
        return $this->modules;
    }

    public function enabled(): array
    {
        return array_filter(
            $this->modules,
            static fn(array $module): bool => ($module['enabled'] ?? false) === true
        );
    }
}
