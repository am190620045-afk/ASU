<?php

namespace ASU\Core\Services;

class ServiceContainer
{
    private array $services = [];

    public function register(string $name, object $service): void
    {
        $this->services[$name] = $service;
    }

    public function get(string $name): ?object
    {
        return $this->services[$name] ?? null;
    }
}
