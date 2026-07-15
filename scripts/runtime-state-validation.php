<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use ASU\Runtime\Persistence;

$persistence = new Persistence(dirname(__DIR__) . '/runtime-state.json');

$state = $persistence->load();

echo json_encode([
    'state_available' => $state !== [],
    'keys' => array_keys($state),
], JSON_PRETTY_PRINT);
