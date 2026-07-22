<?php

declare(strict_types=1);

namespace ASU\Http;

final class Request
{
    public function __construct(
        private readonly string $method,
        private readonly string $uri
    ) {
    }

    public static function fromGlobals(): self
    {
        return new self(
            $_SERVER['REQUEST_METHOD'] ?? 'GET',
            $_SERVER['REQUEST_URI'] ?? '/'
        );
    }

    public function method(): string
    {
        return $this->method;
    }

    public function uri(): string
    {
        return $this->uri;
    }
}
