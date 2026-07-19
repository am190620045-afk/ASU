<?php

declare(strict_types=1);

namespace ASU\Config;

final class KernelConfig
{
    private array $config;

    public function __construct(?string $path = null)
    {
        $loader = new Loader();

        $this->config = $loader->load(
            $path ?? dirname(__DIR__, 2) . '/config/kernel.php'
        );
    }

    public function get(string $key, mixed $default = null): mixed
    {
        $value = $this->config;

        foreach (explode('.', $key) as $segment) {
            if (!is_array($value) || !array_key_exists($segment, $value)) {
                return $default;
            }

            $value = $value[$segment];
        }

        return $value;
    }

    public function all(): array
    {
        return $this->config;
    }
}
