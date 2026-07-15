<?php

spl_autoload_register(function (string $class): void {
    $prefix = 'ASU\\';
    $baseDir = __DIR__ . '/';

    if (str_starts_with($class, $prefix)) {
        $relative = str_replace('\\', '/', substr($class, strlen($prefix)));
        $file = $baseDir . $relative . '.php';

        if (file_exists($file)) {
            require_once $file;
        }
    }
});
