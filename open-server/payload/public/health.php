<?php
header('Content-Type: text/html; charset=utf-8');

$checks = [];

$extensions = [
    'PDO' => extension_loaded('pdo'),
    'PDO MySQL' => extension_loaded('pdo_mysql'),
    'JSON' => extension_loaded('json'),
    'MBSTRING' => extension_loaded('mbstring'),
    'OPENSSL' => extension_loaded('openssl'),
];

foreach ($extensions as $name => $status) {
    $checks[$name] = $status;
}

$paths = [
    'public' => __DIR__,
    'config' => dirname(__DIR__, 2) . '/config',
    'database' => dirname(__DIR__, 2) . '/database',
    'modules' => dirname(__DIR__, 2) . '/modules',
];

?><!doctype html>
<html lang="ru">
<head>
<meta charset="utf-8">
<title>ASU Health Check</title>
<style>
body{font-family:Arial;background:#eef2f6;padding:30px;color:#1f2937}
.card{background:#fff;padding:25px;border-radius:10px;max-width:800px;margin:auto}
.ok{color:green;font-weight:bold}.fail{color:red;font-weight:bold}
</style>
</head>
<body>
<div class="card">
<h1>ASU Environment Check</h1>
<p>PHP: <?= htmlspecialchars(PHP_VERSION) ?></p>
<p>Server: <?= htmlspecialchars($_SERVER['SERVER_SOFTWARE'] ?? 'unknown') ?></p>
<h2>PHP Extensions</h2>
<ul>
<?php foreach ($checks as $name=>$status): ?>
<li><?= htmlspecialchars($name) ?>: <span class="<?= $status ? 'ok':'fail' ?>"><?= $status ? 'OK':'FAIL' ?></span></li>
<?php endforeach; ?>
</ul>
<h2>Project Structure</h2>
<ul>
<?php foreach ($paths as $name=>$path): ?>
<li><?= htmlspecialchars($name) ?>: <span class="<?= is_dir($path) ? 'ok':'fail' ?>"><?= is_dir($path) ? 'OK':'FAIL' ?></span></li>
<?php endforeach; ?>
</ul>
</div>
</body>
</html>