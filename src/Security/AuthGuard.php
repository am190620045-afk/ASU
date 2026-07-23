<?php

declare(strict_types=1);

namespace ASU\Security;

use ASU\Http\Response;

final class AuthGuard
{
    public function __construct(
        private readonly Session $session
    ) {
    }

    public function check(): bool
    {
        return $this->session->userId() !== null;
    }

    public function deny(): Response
    {
        return Response::redirect('/login');
    }
}
