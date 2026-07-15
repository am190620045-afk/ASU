<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use ASU\Runtime\Kernel;

header('Content-Type: text/html; charset=utf-8');

$kernel = new Kernel();
$result = $kernel->boot();

?><!doctype html>
<html>
<head>
    <title>ASU Runtime Dashboard</title>
    <link rel="stylesheet" href="/assets/dashboard.css">
</head>
<body>
    <h1>ASU Runtime Dashboard</h1>

    <div class="card">
        <h2>Kernel</h2>
        <pre><?= htmlspecialchars(json_encode($result['kernel'] ?? null, JSON_PRETTY_PRINT)) ?></pre>
    </div>

    <div class="card">
        <h2>Modules</h2>
        <pre><?= htmlspecialchars(json_encode($result['modules'] ?? [], JSON_PRETTY_PRINT)) ?></pre>
    </div>

    <div class="card">
        <h2>Runtime State</h2>
        <pre><?= htmlspecialchars(json_encode($result['state'] ?? [], JSON_PRETTY_PRINT)) ?></pre>
    </div>

    <div class="card">
        <h2>Full Response</h2>
        <pre><?= htmlspecialchars(json_encode($result, JSON_PRETTY_PRINT)) ?></pre>
    </div>
</body>
</html>
