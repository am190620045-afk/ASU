<?php

declare(strict_types=1);

namespace ASU\Config;

final class Loader
{
    public function load(string $path): array
    {
        if (!is_file($path)) {
            return [];
        }

        $config = require $path;

        return is_array($config) ? $config : [];
    }
}
