<?php

namespace ASU\Database\Migrations;

use PDO;

class MigrationManager
{
    private PDO $pdo;
    private string $path;

    public function __construct(PDO $pdo, ?string $path = null)
    {
        $this->pdo = $pdo;
        $this->path = $path ?? __DIR__;
    }

    public function run(): array
    {
        $this->createHistoryTable();
        $result = [];

        $files = glob($this->path . DIRECTORY_SEPARATOR . '*.sql');
        sort($files);

        foreach ($files as $file) {
            $name = basename($file);

            if ($this->isInstalled($name)) {
                $result[] = ['migration' => $name, 'status' => 'SKIP'];
                continue;
            }

            $this->pdo->exec(file_get_contents($file));

            $stmt = $this->pdo->prepare(
                'INSERT INTO schema_migrations (migration) VALUES (?)'
            );
            $stmt->execute([$name]);

            $result[] = ['migration' => $name, 'status' => 'OK'];
        }

        return $result;
    }

    private function createHistoryTable(): void
    {
        $this->pdo->exec('CREATE TABLE IF NOT EXISTS schema_migrations (
            id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255) NOT NULL UNIQUE,
            executed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4');
    }

    private function isInstalled(string $migration): bool
    {
        $stmt = $this->pdo->prepare(
            'SELECT COUNT(*) FROM schema_migrations WHERE migration = ?'
        );
        $stmt->execute([$migration]);
        return (bool) $stmt->fetchColumn();
    }
}
