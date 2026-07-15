<?php

namespace ASU\Core\Services;

use ASU\Security\Auth\Authentication;
use ASU\Security\Users\UserManager;
use ASU\Security\Roles\RoleManager;
use ASU\Security\Permissions\PermissionManager;
use ASU\Security\Users\User;

class SecurityService
{
    private UserManager $users;
    private RoleManager $roles;
    private PermissionManager $permissions;

    public function __construct(private Authentication $authentication)
    {
        $this->users = new UserManager();
        $this->roles = new RoleManager();
        $this->permissions = new PermissionManager();
    }

    public function authenticate(string $username, string $password): bool
    {
        return $this->authentication->verify($username, $password);
    }

    public function addUser(User $user): void
    {
        $this->users->add([
            'name' => $user->getName(),
            'roles' => $user->roles()
        ]);
    }

    public function hasRole(User $user, string $role): bool
    {
        return in_array($role, $user->roles(), true);
    }

    public function users(): UserManager
    {
        return $this->users;
    }

    public function roles(): RoleManager
    {
        return $this->roles;
    }

    public function permissions(): PermissionManager
    {
        return $this->permissions;
    }
}
