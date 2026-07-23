<?php

declare(strict_types=1);

namespace ASU\Config;

final class ConfigRepository
{
    /** @return array<string, mixed> */
    public function database(): array
    {
        return [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'port' => 3306,
            'database' => 'asu',
            'charset' => 'utf8mb4',
            'username' => 'root',
            'password' => '',
        ];
    }
}
