<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use ASU\Module\Status as ModuleStatus;
use ASU\Runtime\State;
use ASU\Runtime\Status;

header('Content-Type: application/json');

$state = new State();
$status = new Status($state);

$modules = new ModuleStatus(new ASU\Module\Registry());

echo json_encode($status->report($modules), JSON_PRETTY_PRINT);
