<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use ASU\Runtime\Kernel;

header('Content-Type: application/json');

try {
    $kernel = new Kernel();
    $kernel->boot();

    echo json_encode([
        'status' => 'ok',
        'runtime' => '0.2.0-beta-runtime.2',
    ], JSON_PRETTY_PRINT);
} catch (\Throwable $exception) {
    http_response_code(500);

    echo json_encode([
        'status' => 'error',
        'message' => $exception->getMessage(),
    ], JSON_PRETTY_PRINT);
}
