<?php

namespace ASU\Core\Http;

class Router
{
    private array $routes = [];

    public function get(string $path, callable $handler): void
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function dispatch(string $method, string $path): mixed
    {
        $handler = $this->routes[$method][$path] ?? null;

        if ($handler === null) {
            return null;
        }

        return $handler();
    }
}
