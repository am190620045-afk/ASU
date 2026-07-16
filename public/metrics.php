<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use ASU\Runtime\Metrics;
use ASU\Runtime\MetricsReport;

header('Content-Type: application/json');

try {
    $report = new MetricsReport(new Metrics());

    echo json_encode($report->generate(), JSON_PRETTY_PRINT);
} catch (\Throwable $exception) {
    http_response_code(500);

    echo json_encode([
        'status' => 'error',
        'code' => 'RUNTIME_FAILURE',
    ], JSON_PRETTY_PRINT);
}
