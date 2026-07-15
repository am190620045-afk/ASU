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
    <title>ASU Dashboard</title>
</head>
<body>
    <h1>ASU Runtime Dashboard</h1>
    <section>
        <h2>Runtime</h2>
        <pre><?= htmlspecialchars(json_encode($result, JSON_PRETTY_PRINT)) ?></pre>
    </section>
</body>
</html>
