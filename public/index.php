<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use ASU\Runtime\ExceptionHandler;
use ASU\Runtime\Kernel;

header('Content-Type: text/html; charset=utf-8');

try {
    $kernel = new Kernel();
    $result = $kernel->boot();
} catch (\Throwable $exception) {
    $handler = new ExceptionHandler();
    http_response_code(500);
    $result = $handler->handle($exception);
}

?>
<!doctype html>
<html>
<head>
    <title>ASU Runtime Dashboard</title>
</head>
<body>
    <h1>ASU Runtime Dashboard</h1>
    <pre><?= htmlspecialchars(json_encode($result, JSON_PRETTY_PRINT)) ?></pre>
</body>
</html>
