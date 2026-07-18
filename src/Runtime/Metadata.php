<?php

declare(strict_types=1);

namespace ASU\Runtime;

use ASU\Config\RuntimeConfig;

final class Metadata
{
    public static function get(): array
    {
        $config = new RuntimeConfig();

        return [
            'name' => $config->get('name', 'ASU'),
            'version' => $config->get('version', 'unknown'),
            'stage' => $config->get('stage', 'unknown'),
            'composer' => true,
        ];
    }
}
