<?php

declare(strict_types=1);

namespace ASU\Module;

final class Bootstrap
{
    public function initialize(string $directory, Registry $registry): array
    {
        $discovery = new Discovery();
        $loader = new Loader();

        foreach ($discovery->scan($directory) as $module) {
            $manifest = $loader->load($directory . DIRECTORY_SEPARATOR . $module);
            if ($manifest !== []) {
                $registry->add($manifest);
            }
        }

        return $registry->enabled();
    }
}
