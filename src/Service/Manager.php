<?php

declare(strict_types=1);

namespace ASU\Service;

final class Manager
{
    private array $services = [];

    public function register(string $name, object $service): void
    {
        $this->services[$name] = $service;
    }

    public function discover(): array
    {
        $discovery = new Discovery();

        return $discovery->scan($this->services);
    }

    public function all(): array
    {
        return $this->services;
    }
}
