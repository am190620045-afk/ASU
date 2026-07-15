<?php

declare(strict_types=1);

namespace ASU\Module;

final class Loader
{
    public function load(string $directory): array
    {
        if (!is_file($directory . '/module.php')) {
            return [];
        }

        $module = require $directory . '/module.php';

        return is_array($module) ? $module : [];
    }
}
