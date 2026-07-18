<?php

declare(strict_types=1);

namespace ASU\Runtime;

final class Bootstrap
{
    public static function initialize(): array
    {
        return [
            'runtime' => 'ASU',
            'version' => '0.3.4',
            'status' => 'initialized',
        ];
    }
}
