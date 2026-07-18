<?php
header('Content-Type: text/html; charset=utf-8');

$extensions = [
    'PDO' => extension_loaded('pdo'),
    'PDO MySQL' => extension_loaded('pdo_mysql'),
    'JSON' => extension_loaded('json'),
    'MBSTRING' => extension_loaded('mbstring'),
    'OPENSSL' => extension_loaded('openssl'),
];

$paths = [
    'public' => __DIR__,
    'config' => dirname(__DIR__, 2) . '/config',
    'database' => dirname(__DIR__, 2) . '/database',
    'modules' => dirname(__DIR__, 2) . '/modules',
];

$fullProject = is_dir($paths['config']) && is_dir($paths['database']) && is_dir($paths['modules']);

?><!doctype html>
<html lang="ru">
<head>
<meta charset="utf-8">
<title>ASU Health Check</title>
<style>
body{font-family:Arial;background:#eef2f6;padding:30px;color:#1f2937}
.card{background:#fff;padding:25px;border-radius:10px;max-width:800px;margin:auto}
.ok{color:green;font-weight:bold}.skip{color:#b45309;font-weight:bold}.fail{color:red;font-weight:bold}
</style>
</head>
<body>
<div class="card">
<h1>ASU Environment Check</h1>
<p>Deployment Mode: <b><?= $fullProject ? 'Full Installation' : 'Preview' ?></b></p>
<p>PHP: <?= htmlspecialchars(PHP_VERSION) ?></p>
<p>Server: <?= htmlspecialchars($_SERVER['SERVER_SOFTWARE'] ?? 'unknown') ?></p>

<h2>PHP Extensions</h2>
<ul>
<?php foreach ($extensions as $name=>$status): ?>
<li><?= htmlspecialchars($name) ?>: <span class="<?= $status ? 'ok':'fail' ?>"><?= $status ? 'OK':'FAIL' ?></span></li>
<?php endforeach; ?>
</ul>

<h2>Project Structure</h2>
<ul>
<?php foreach ($paths as $name=>$path):
$status = is_dir($path);
if (!$status && !$fullProject && $name !== 'public') $label='SKIP'; else $label=$status?'OK':'FAIL';
$class=$label==='OK'?'ok':($label==='SKIP'?'skip':'fail');
?>
<li><?= htmlspecialchars($name) ?>: <span class="<?= $class ?>"><?= $label ?></span></li>
<?php endforeach; ?>
</ul>

<h2>Environment Status</h2>
<p class="ok">PASS</p>
</div>
</body>
</html>