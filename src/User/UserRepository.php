<?php

declare(strict_types=1);

namespace ASU\User;

use ASU\Database\DatabaseInterface;

final class UserRepository
{
    public function __construct(
        private readonly DatabaseInterface $database
    ) {
    }

    public function count(): int
    {
        $statement = $this->database
            ->connection()
            ->query('SELECT COUNT(*) FROM users');

        return (int) $statement->fetchColumn();
    }
}
