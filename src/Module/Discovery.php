<?php

declare(strict_types=1);

namespace ASU\Module;

final class Discovery
{
    public function scan(string $directory): array
    {
        if (!is_dir($directory)) {
            return [];
        }

        $modules = [];

        foreach (scandir($directory) as $entry) {
            if ($entry === '.' || $entry === '..') {
                continue;
            }

            if (is_dir($directory . DIRECTORY_SEPARATOR . $entry)) {
                $modules[] = $entry;
            }
        }

        return $modules;
    }
}
