<?php

declare(strict_types=1);

namespace ASU\Database;

use PDO;

final class DatabaseManager
{
    private ?PDO $connection = null;

    public function __construct(
        private readonly Connection $factory
    ) {
    }

    public function connection(): PDO
    {
        if ($this->connection === null) {
            $this->connection = $this->factory->create();
        }

        return $this->connection;
    }
}
