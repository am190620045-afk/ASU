<?php

declare(strict_types=1);

namespace ASU\Database;

use PDO;

final class Connection
{
    public function __construct(
        private readonly string $dsn,
        private readonly string $username,
        private readonly string $password
    ) {
    }

    public function create(): PDO
    {
        return new PDO(
            $this->dsn,
            $this->username,
            $this->password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );
    }
}
