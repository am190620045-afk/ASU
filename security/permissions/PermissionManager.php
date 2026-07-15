<?php

namespace ASU\Security\Permissions;

class PermissionManager
{
    private array $permissions = [];

    public function grant(string $permission): void
    {
        $this->permissions[] = $permission;
    }

    public function all(): array
    {
        return $this->permissions;
    }
}
