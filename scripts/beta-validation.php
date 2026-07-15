<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

$checks = [
    'runtime' => 'scripts/runtime-smoke-test.php',
    'modules' => 'scripts/module-validation.php',
];

$result = [];

foreach ($checks as $name => $script) {
    $result[$name] = is_file(dirname(__DIR__) . '/' . $script);
}

echo json_encode([
    'version' => '0.2.0-beta-runtime.1',
    'checks' => $result,
    'status' => !in_array(false, $result, true) ? 'ready' : 'failed',
], JSON_PRETTY_PRINT);
