<?php
header('Content-Type: text/html; charset=utf-8');

$status = false;
$message = 'NOT CONFIGURED';

$configFile = dirname(__DIR__) . '/config/database.ini';

if (file_exists($configFile)) {
    $config = parse_ini_file($configFile, true)['database'] ?? [];

    try {
        $dsn = sprintf(
            '%s:host=%s;port=%s;dbname=%s;charset=%s',
            $config['driver'] ?? 'mysql',
            $config['host'] ?? '127.0.0.1',
            $config['port'] ?? '3306',
            $config['database'] ?? 'asu',
            $config['charset'] ?? 'utf8mb4'
        );

        new PDO($dsn, $config['username'] ?? 'root', $config['password'] ?? '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);

        $status = true;
        $message = 'CONNECTED';
    } catch (Throwable $e) {
        $message = 'FAILED';
    }
}

?>
<!doctype html>
<html lang="ru">
<head>
<meta charset="utf-8">
<title>ASU Database Check</title>
<style>body{font-family:Arial;background:#eef2f6;padding:30px}.card{background:#fff;padding:25px;border-radius:10px;max-width:700px;margin:auto}.ok{color:green;font-weight:bold}.fail{color:red;font-weight:bold}</style>
</head>
<body>
<div class="card">
<h1>ASU Database Check</h1>
<p>Driver: MySQL</p>
<p>Database status: <span class="<?= $status ? 'ok':'fail' ?>"><?= $message ?></span></p>
<p>PHP: <?= PHP_VERSION ?></p>
</div>
</body>
</html>
