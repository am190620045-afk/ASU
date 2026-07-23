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

        session_regenerate_id(true);

        $_SESSION['user_id'] = $userId;
    }

    public function logout(): void
    {
        $this->start();

        $_SESSION = [];

        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        session_destroy();
    }

    public function userId(): ?int
    {
        $this->start();

        return isset($_SESSION['user_id'])
            ? (int) $_SESSION['user_id']
            : null;
    }
}
