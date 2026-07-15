<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use ASU\Runtime\Metrics;
use ASU\Runtime\MetricsReport;

header('Content-Type: application/json');

$report = new MetricsReport(new Metrics());

echo json_encode($report->generate(), JSON_PRETTY_PRINT);
