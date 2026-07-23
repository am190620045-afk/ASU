<?php

declare(strict_types=1);

namespace ASU\Http\Middleware;

use ASU\Http\Request;
use ASU\Http\Response;

final class MiddlewarePipeline
{
    /** @var list<MiddlewareInterface> */
    private array $middlewares = [];

    public function add(MiddlewareInterface $middleware): void
    {
        $this->middlewares[] = $middleware;
    }

    public function handle(Request $request, callable $destination): Response
    {
        $handler = array_reduce(
            array_reverse($this->middlewares),
            static function (callable $next, MiddlewareInterface $middleware): callable {
                return static fn (Request $request): Response => $middleware->process($request, $next);
            },
            $destination
        );

        return $handler($request);
    }
}
