<?php

declare(strict_types=1);

namespace ASU\Http\Middleware;

use ASU\Http\Request;
use ASU\Http\Response;
use ASU\Security\AuthGuard;

final class AuthMiddleware implements MiddlewareInterface
{
    public function __construct(
        private readonly AuthGuard $guard
    ) {
    }

    public function process(Request $request, callable $next): Response
    {
        if ($this->isPublicRoute($request)) {
            return $next($request);
        }

        if (!$this->guard->check()) {
            return $this->guard->deny();
        }

        return $next($request);
    }

    private function isPublicRoute(Request $request): bool
    {
        return (
            $request->method() === 'GET'
            && in_array($request->uri(), ['/', '/login'], true)
        ) || (
            $request->method() === 'POST'
            && $request->uri() === '/login'
        );
    }
}
