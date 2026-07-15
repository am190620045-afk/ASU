<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use ASU\Module\Discovery;
use ASU\Module\Loader;
use ASU\Module\Registry;

$registry = new Registry();
$discovery = new Discovery();
$loader = new Loader();

foreach ($discovery->scan(dirname(__DIR__) . '/modules') as $module) {
    $manifest = $loader->load(dirname(__DIR__) . '/modules/' . $module);
    $registry->add($manifest);
}

echo json_encode([
    'modules' => $registry->all(),
    'enabled' => $registry->enabled(),
], JSON_PRETTY_PRINT);
