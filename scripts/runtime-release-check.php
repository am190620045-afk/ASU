<?php

declare(strict_types=1);

$files = [
    'composer.json',
    'src/Runtime/Kernel.php',
    'src/Module/Bootstrap.php',
    '.github/workflows/beta-validation.yml',
    'runtime.json',
];

$result = [];

foreach ($files as $file) {
    $result[$file] = is_file(dirname(__DIR__) . '/' . $file);
}

echo json_encode([
    'release' => '0.2.0-beta-runtime.1',
    'ready' => !in_array(false, $result, true),
    'files' => $result,
], JSON_PRETTY_PRINT);
