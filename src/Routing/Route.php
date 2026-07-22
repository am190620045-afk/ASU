<?php

declare(strict_types=1);

namespace ASU\Routing;

final class Route
{
    public function __construct(
        private readonly string $method,
        private readonly string $path,
        private readonly mixed $handler
    ) {
    }

    public function matches(string $method, string $path): bool
    {
        return $this->method === $method && $this->path === $path;
    }

    public function handler(): mixed
    {
        return $this->handler;
    }
}
