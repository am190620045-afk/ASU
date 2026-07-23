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
        $user = $this->users->findByUsername($username);

        if ($user === null) {
            return false;
        }

        if (!$this->hasher->verify($password, $user->passwordHash())) {
            return false;
        }

        $this->session->login($user->id());

        return true;
    }

    public function logout(): void
    {
        $this->session->logout();
    }
}
