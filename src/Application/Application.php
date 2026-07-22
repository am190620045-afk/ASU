<?php

declare(strict_types=1);

namespace ASU\Application;

use ASU\Http\Request;
use ASU\Http\Response;
use ASU\Routing\Router;

final class Application implements ApplicationInterface
{
    public function __construct(
        private readonly Router $router,
    ) {
    }

    public function run(Request $request): Response
    {
        $route = $this->router->match($request->method(), $request->uri());

        if ($route === null) {
            return new Response('Not Found', 404);
        }

        $handler = $route->handler();

        if (is_callable($handler)) {
            return $handler($request);
        }

        return new Response('Application handler is not available', 500);
    }
}
