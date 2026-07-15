<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use ASU\Runtime\Kernel;

$kernel = new Kernel();
$result = $kernel->boot();

$passed = ($result['kernel'] ?? null) === 'ready';

echo $passed ? "ASU runtime smoke test: OK\n" : "ASU runtime smoke test: FAILED\n";

exit($passed ? 0 : 1);
