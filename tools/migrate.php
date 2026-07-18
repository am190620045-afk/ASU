<?php

require_once __DIR__ . '/../autoload.php';

use ASU\Database\Migrations\MigrationManager;

$configFile = __DIR__ . '/../config/database.ini';

if (!file_exists($configFile)) {
    echo "Database configuration not found.\n";
    exit(1);
}

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

    $pdo = new PDO(
        $dsn,
        $config['username'] ?? 'root',
        $config['password'] ?? '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    $manager = new MigrationManager($pdo);
    $result = $manager->run();

    echo "ASU Migration Runner\n\n";

    foreach ($result as $item) {
        echo '[' . $item['status'] . '] ' . $item['migration'] . "\n";
    }

    echo "\nMigration completed\n";

} catch (Throwable $e) {
    echo "Migration failed: " . $e->getMessage() . "\n";
    exit(1);
}
