<?php

declare(strict_types=1);

namespace ASU\Security;

final class Session
{
    public function start(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public function login(int $userId): void
    {
        $this->start();
        $_SESSION['user_id'] = $userId;
    }

    public function logout(): void
    {
        $this->start();
        unset($_SESSION['user_id']);
    }

    public function userId(): ?int
    {
        $this->start();

        return isset($_SESSION['user_id'])
            ? (int) $_SESSION['user_id']
            : null;
    }
}
