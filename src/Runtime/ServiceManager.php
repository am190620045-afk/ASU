<?php

declare(strict_types=1);

namespace ASU\Runtime;

final class ServiceManager
{
    private array $services = [];

    public function register(string $name, object $service): void
    {
        $this->services[$name] = $service;
    }

    public function boot(): array
    {
        foreach ($this->services as $service) {
            if (method_exists($service, 'boot')) {
                $service->boot();
            }
        }

        return array_keys($this->services);
    }

    public function shutdown(): void
    {
        foreach ($this->services as $service) {
            if (method_exists($service, 'shutdown')) {
                $service->shutdown();
            }
        }
    }
}
