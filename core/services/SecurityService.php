<?php

namespace ASU\Core\Services;

use ASU\Security\Auth\Authentication;

class SecurityService
{
    public function __construct(private Authentication $authentication)
    {
    }

    public function authenticate(string $username, string $password): bool
    {
        return $this->authentication->verify($username, $password);
    }
}
