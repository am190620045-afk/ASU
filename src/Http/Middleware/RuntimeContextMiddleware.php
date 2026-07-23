<?php

declare(strict_types=1);

namespace ASU\Http\Middleware;

use ASU\Http\Request;
use ASU\Http\Response;
use ASU\Runtime\WebApplicationRuntime;

final class RuntimeContextMiddleware implements MiddlewareInterface
{
    public function process(Request $request, callable $next): Response
    {
        $context = WebApplicationRuntime::context();

        if ($context !== null) {
            $context->set('middleware_runtime', true);
        }

        return $next($request);
    }
}
