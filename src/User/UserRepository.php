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

    public function findByUsername(string $username): ?User
    {
        $statement = $this->database
            ->connection()
            ->prepare('SELECT * FROM users WHERE username = :username LIMIT 1');

        $statement->execute([
            'username' => $username,
        ]);

        $row = $statement->fetch();

        if ($row === false) {
            return null;
        }

        return $this->hydrate($row);
    }

    public function findById(int $id): ?User
    {
        $statement = $this->database
            ->connection()
            ->prepare('SELECT * FROM users WHERE id = :id LIMIT 1');

        $statement->execute([
            'id' => $id,
        ]);

        $row = $statement->fetch();

        if ($row === false) {
            return null;
        }

        return $this->hydrate($row);
    }

    private function hydrate(array $row): User
    {
        return new User(
            (int) $row['id'],
            $row['username'],
            $row['email'],
            $row['role'],
            $row['status'],
            $row['password_hash']
        );
    }
}
