<?php

namespace ASU\Modules\Registry;

class ModuleRegistry
{
    private array $registered = [];

    public function add(string $name): void
    {
        $this->registered[] = $name;
    }

    public function all(): array
    {
        return $this->registered;
    }
}
