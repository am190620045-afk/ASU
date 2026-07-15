<?php

namespace ASU\Core\Services;

use ASU\Database\Connection\Database;

class DatabaseService
{
    public function __construct(private Database $database)
    {
    }

    public function connect(array $config): \PDO
    {
        return $this->database->connect($config);
    }
}
