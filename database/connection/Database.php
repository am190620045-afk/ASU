<?php

namespace ASU\Database\Connection;

use PDO;

class Database
{
    private ?PDO $connection = null;

    public function connect(array $config): PDO
    {
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=utf8mb4',
            $config['host'] ?? 'localhost',
            $config['name'] ?? 'asu'
        );

        $this->connection = new PDO($dsn, $config['user'] ?? '', $config['password'] ?? '');
        return $this->connection;
    }
}
