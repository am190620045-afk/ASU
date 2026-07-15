<?php

namespace ASU\Security\Users;

class User
{
    public function __construct(
        private string $name,
        private array $roles = []
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addRole(string $role): void
    {
        $this->roles[] = $role;
    }

    public function roles(): array
    {
        return $this->roles;
    }
}
