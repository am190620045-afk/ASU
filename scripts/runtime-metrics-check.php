<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use ASU\Runtime\Metrics;

$metrics = new Metrics();
$metrics->record('check', 'ok');

echo json_encode([
    'metrics' => $metrics->all(),
], JSON_PRETTY_PRINT);
