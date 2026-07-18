<?php

declare(strict_types=1);

namespace ASU\Runtime;

final class Metadata
{
    public static function get(): array
    {
        return [
            'name' => 'ASU',
            'version' => '0.3.4',
            'stage' => 'beta-runtime',
            'composer' => true,
        ];
    }
}
