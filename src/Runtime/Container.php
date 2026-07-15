<?php

declare(strict_types=1);

namespace ASU\Runtime;

final class Container
{
    private array $services = [];

    public function set(string $id, mixed $service): void
    {
        $this->services[$id] = $service;
    }

    public function get(string $id): mixed
    {
        return $this->services[$id] ?? null;
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->services);
    }
}
