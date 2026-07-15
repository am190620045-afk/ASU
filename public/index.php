<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use ASU\Runtime\Kernel;

$kernel = new Kernel();

header('Content-Type: application/json');
echo json_encode($kernel->boot(), JSON_PRETTY_PRINT);
