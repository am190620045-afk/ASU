<?php

namespace ASU\Core\Config;

class ConfigLoader
{
    private array $config = [];

    public function load(string $file): array
    {
        if (!file_exists($file)) {
            return [];
        }

        $this->config = parse_ini_file($file, true) ?: [];

        return $this->config;
    }

    public function get(string $section, ?string $key = null, mixed $default = null): mixed
    {
        if ($key === null) {
            return $this->config[$section] ?? $default;
        }

        return $this->config[$section][$key] ?? $default;
    }
}
