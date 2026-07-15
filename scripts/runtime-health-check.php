<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use ASU\Runtime\Kernel;

$kernel = new Kernel();
$result = $kernel->boot();

echo json_encode([
    'status' => $result['kernel'] === 'ready' ? 'ok' : 'failed',
    'runtime' => $result['metadata'] ?? null,
    'modules' => $result['modules'] ?? [],
], JSON_PRETTY_PRINT);
