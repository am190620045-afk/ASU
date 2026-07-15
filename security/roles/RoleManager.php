<?php

namespace ASU\Security\Roles;

class RoleManager
{
    private array $roles = [];

    public function create(string $role): void
    {
        $this->roles[] = $role;
    }

    public function all(): array
    {
        return $this->roles;
    }
}
