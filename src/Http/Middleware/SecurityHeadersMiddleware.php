<?php

declare(strict_types=1);

namespace ASU\Http\Middleware;

use ASU\Http\Request;
use ASU\Http\Response;

final class SecurityHeadersMiddleware implements MiddlewareInterface
{
    public function process(Request $request, callable $next): Response
    {
        $response = $next($request);

        return new Response(
            $response->content(),
            $response->statusCode(),
            array_merge(
                $response->headers(),
                [
                    'X-Frame-Options' => 'SAMEORIGIN',
                    'X-Content-Type-Options' => 'nosniff',
                    'Referrer-Policy' => 'same-origin',
                ]
            )
        );
    }
}
