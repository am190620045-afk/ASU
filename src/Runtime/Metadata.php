<?php

declare(strict_types=1);

namespace ASU\Runtime;

final class Metadata
{
    public static function get(): array
    {
        return [
            'name' => 'ASU',
            'version' => '0.2.0-beta-runtime.1',
            'stage' => 'beta-runtime',
            'composer' => true,
        ];
    }
}
