<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use ASU\Runtime\Metrics;
use ASU\Runtime\Observability;
use ASU\Runtime\Performance;

$report = new Observability(new Metrics(), new Performance());

echo json_encode(
    $report->report(0.0),
    JSON_PRETTY_PRINT
);
