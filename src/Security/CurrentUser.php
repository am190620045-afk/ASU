<?php

declare(strict_types=1);

namespace ASU\Security;

use ASU\User\User;
use ASU\User\UserRepository;

final class CurrentUser
{
    public function __construct(
        private readonly Session $session,
        private readonly UserRepository $users
    ) {
    }

    public function get(): ?User
    {
        $userId = $this->session->userId();

        if ($userId === null) {
            return null;
        }

        return $this->users->findById($userId);
    }

    public function authenticated(): bool
    {
        return $this->get() !== null;
    }
}
