<?php

declare(strict_types=1);

namespace ASU\Controller;

use ASU\Http\Response;
use ASU\Security\AuthGuard;
use ASU\Security\CurrentUser;
use ASU\View\RendererInterface;

final class DashboardController extends Controller
{
    public function __construct(
        private readonly RendererInterface $renderer,
        private readonly CurrentUser $currentUser,
        private readonly AuthGuard $guard
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
                    'user' => $this->currentUser->get(),
                ]
            )
        );
    }
}
