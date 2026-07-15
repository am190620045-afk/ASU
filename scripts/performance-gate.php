<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use ASU\Runtime\Performance;

$seconds = (float) ($argv[1] ?? 0);

$result = (new Performance())->check($seconds);

if ($result['status'] !== 'ok') {
    exit(1);
}

echo json_encode($result, JSON_PRETTY_PRINT);
