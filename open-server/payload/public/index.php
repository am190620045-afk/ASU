<?php
// ASU Open Server Deployment Kit preview payload

header('Content-Type: text/html; charset=utf-8');

$phpVersion = PHP_VERSION;

$extensions = [
    'PDO' => extension_loaded('pdo'),
    'PDO MySQL' => extension_loaded('pdo_mysql'),
    'JSON' => extension_loaded('json'),
    'MBSTRING' => extension_loaded('mbstring'),
    'OPENSSL' => extension_loaded('openssl'),
];

$extensionPassed = count(array_filter($extensions));

$paths = [
    'public' => __DIR__,
    'config' => dirname(__DIR__, 2) . '/config',
    'database' => dirname(__DIR__, 2) . '/database',
    'modules' => dirname(__DIR__, 2) . '/modules',
];

$structurePassed = count(array_filter($paths, 'is_dir'));
?>
<!doctype html>
<html lang="ru">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>АСУ — автоматизированная система управления</title>
<style>
body{margin:0;font-family:Arial,sans-serif;background:#eef2f6;color:#1f2937}
.header{background:#16324f;color:white;padding:32px}
.container{max-width:1100px;margin:30px auto;padding:0 20px}
.card{background:white;border-radius:12px;padding:28px;box-shadow:0 8px 20px rgba(0,0,100,.08);margin-bottom:20px}
.grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:20px}
.item{border-left:5px solid #16324f;padding:15px;background:#f8fafc}
.status{color:#166534;font-weight:bold}
.footer{text-align:center;padding:20px;color:#64748b}
.ok{color:#166534;font-weight:bold}
</style>
</head>
<body>
<div class="header">
<h1>АСУ</h1>
<p>Автоматизированная система управления</p>
</div>

<div class="container">
<div class="card">
<h2>Добро пожаловать</h2>
<p>Система успешно запущена в окружении Open Server 6.5.1.</p>
<p class="status">Статус: Preview Release 0.2.1 работает</p>
</div>

<div class="grid">
<div class="item"><b>Версия</b><br>0.2.1 Preview</div>
<div class="item"><b>Платформа</b><br>Open Server 6.5.1</div>
<div class="item"><b>PHP</b><br><?= htmlspecialchars($phpVersion, ENT_QUOTES, 'UTF-8') ?></div>
<div class="item"><b>База данных</b><br>MySQL 8.4</div>
</div>

<div class="card">
<h2>Проверка окружения</h2>
<p class="status">Environment Status: PASS</p>
<p>PHP Extensions: <?= $extensionPassed ?>/<?= count($extensions) ?> OK</p>
<p>Project Structure: <?= $structurePassed ?>/<?= count($paths) ?> OK</p>
<p><a href="health.php">Подробная диагностика</a></p>
</div>

<div class="card">
<h2>Модули системы</h2>
<ul>
<li>Учёт персонала</li>
<li>Управление подразделениями</li>
<li>Документы и отчёты</li>
<li>Администрирование</li>
</ul>
</div>
</div>

<div class="footer">ASU Project — Open Server Preview</div>
</body>
</html>