<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use ASU\Runtime\Kernel;

header('Content-Type: application/json');

try {
    $kernel = new Kernel();
    $result = $kernel->boot();

    echo json_encode([
        'status' => ($result['kernel'] ?? null) === 'ready' ? 'ok' : 'failed',
        'runtime' => $result['metadata'] ?? null,
        'modules' => $result['modules'] ?? [],
        'timestamp' => date(DATE_ATOM),
    ], JSON_PRETTY_PRINT);
} catch (\Throwable $exception) {
    http_response_code(500);

    echo json_encode([
        'status' => 'error',
        'code' => 'RUNTIME_FAILURE',
    ], JSON_PRETTY_PRINT);
}
