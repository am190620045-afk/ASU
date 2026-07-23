<?php

declare(strict_types=1);

namespace ASU\User;

final class User
{
    public function __construct(
        private readonly int $id,
        private readonly string $username,
        private readonly string $email,
        private readonly string $role,
        private readonly string $status,
        private readonly string $passwordHash
    ) {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function role(): string
    {
        return $this->role;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function passwordHash(): string
    {
        return $this->passwordHash;
    }
}
