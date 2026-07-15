<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use ASU\Module\Status;
use ASU\Module\Registry;

header('Content-Type: application/json');

$report = new Status(new Registry());

echo json_encode([
    'modules' => $report->report(),
], JSON_PRETTY_PRINT);
