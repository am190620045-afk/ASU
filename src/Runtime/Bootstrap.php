<?php

declare(strict_types=1);

namespace ASU\Runtime;

use ASU\Config\RuntimeConfig;

final class Bootstrap
{
    public static function initialize(): array
    {
        $config = new RuntimeConfig();

        return [
            'runtime' => $config->get('name', 'ASU'),
            'version' => $config->get('version', 'unknown'),
            'status' => 'initialized',
        ];
    }
}
