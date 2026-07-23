<?php

declare(strict_types=1);

namespace ASU\Controller;

use ASU\Http\Response;
use ASU\Security\AuthGuard;

final class DashboardController extends Controller
{
    public function __construct(
        private readonly AuthGuard $guard
    ) {
    }

    public function index(): Response
    {
        if (!$this->guard->check()) {
            return $this->guard->deny();
        }

        return new Response('<h1>ASU Dashboard</h1>');
    }
}
