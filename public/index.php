<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use ASU\Runtime\ExceptionHandler;
use ASU\Runtime\Kernel;

header('Content-Type: application/json');

try {
    $kernel = new Kernel();
    echo json_encode($kernel->boot(), JSON_PRETTY_PRINT);
} catch (\Throwable $exception) {
    $handler = new ExceptionHandler();
    http_response_code(500);
    echo json_encode($handler->handle($exception), JSON_PRETTY_PRINT);
}
