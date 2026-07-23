<?php

declare(strict_types=1);

namespace ASU\Http\Middleware;

use ASU\Http\Request;
use ASU\Http\Response;
use ASU\Runtime\WebApplicationRuntime;

final class RequestIdMiddleware implements MiddlewareInterface
{
    public function process(Request $request, callable $next): Response
    {
        $requestId = bin2hex(random_bytes(8));

        $context = WebApplicationRuntime::context();

        if ($context !== null) {
            $context->set('request_id', $requestId);
        }

        $response = $next($request);

        return new Response(
            $response->content(),
            $response->statusCode(),
            array_merge(
                $response->headers(),
                ['X-Request-ID' => $requestId]
            )
        );
    }
}
