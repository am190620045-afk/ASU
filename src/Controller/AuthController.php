<?php

declare(strict_types=1);

namespace ASU\Controller;

use ASU\Http\Response;
use ASU\Security\Authenticator;
use ASU\View\RendererInterface;

final class AuthController extends Controller
{
    public function __construct(
        private readonly RendererInterface $renderer,
        private readonly Authenticator $authenticator
    ) {
    }

    public function login(): Response
    {
        return new Response(
            $this->renderer->render('auth/login.php')
        );
    }

    public function logout(): Response
    {
        $this->authenticator->logout();

        return new Response('Logged out');
    }
}
