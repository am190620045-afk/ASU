<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use ASU\Runtime\Kernel;

$start = microtime(true);

$kernel = new Kernel();
$kernel->boot();

$elapsed = microtime(true) - $start;

echo json_encode([
    'runtime' => '0.2.0-beta-runtime.2',
    'boot_seconds' => $elapsed,
], JSON_PRETTY_PRINT);
