<?php

declare(strict_types=1);

namespace ASU\Controller;

use ASU\Http\Response;
use ASU\Security\AuthGuard;
use ASU\Security\Session;
use ASU\View\RendererInterface;

final class DashboardController extends Controller
{
    public function __construct(
        private readonly AuthGuard $guard,
        private readonly RendererInterface $renderer,
        private readonly Session $session
    ) {
    }

    public function index(): Response
    {
        if (!$this->guard->check()) {
            return $this->guard->deny();
        }

        return new Response(
            $this->renderer->render(
                'dashboard/index.php',
                [
                    'userId' => $this->session->userId(),
                ]
            )
        );
    }
}
