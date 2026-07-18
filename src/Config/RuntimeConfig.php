<?php

declare(strict_types=1);

namespace ASU\Config;

final class RuntimeConfig
{
    private array $config;

    public function __construct()
    {
        $loader = new Loader();
        $this->config = $loader->load(dirname(__DIR__, 2) . '/config/runtime.php');
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return $this->config[$key] ?? $default;
    }

    public function all(): array
    {
        return $this->config;
    }
}
