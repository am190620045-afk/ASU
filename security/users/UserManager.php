<?php

namespace ASU\Security\Users;

class UserManager
{
    private array $users = [];

    public function add(array $user): void
    {
        $this->users[] = $user;
    }

    public function all(): array
    {
        return $this->users;
    }
}
