<?php

declare(strict_types=1);

namespace ASU\Http;

final class Request
{
    public function __construct(
        private readonly string $method,
        private readonly string $uri,
        private readonly array $input = []
    ) {
    }

    public static function fromGlobals(): self
    {
        return new self(
            $_SERVER['REQUEST_METHOD'] ?? 'GET',
            $_SERVER['REQUEST_URI'] ?? '/',
            $_POST
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

    public function input(string $key, mixed $default = null): mixed
    {
        return $this->input[$key] ?? $default;
    }
}
