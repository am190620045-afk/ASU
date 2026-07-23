<?php

declare(strict_types=1);

namespace ASU\Security;

use ASU\User\UserRepository;

final class Authenticator
{
    public function __construct(
        private readonly UserRepository $users,
        private readonly PasswordHasher $hasher,
        private readonly Session $session
    ) {
    }

    public function login(
        string $username,
        string $password
    ): bool {
        // User lookup will be connected after repository authentication methods are added.
        return false;
    }

    public function logout(): void
    {
        $this->session->logout();
    }
}
