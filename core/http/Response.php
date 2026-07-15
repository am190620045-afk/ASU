<?php

namespace ASU\Core\Http;

class Response
{
    public function __construct(
        private mixed $body = null,
        private int $status = 200,
        private array $headers = []
    ) {
    }

    public function body(): mixed
    {
        return $this->body;
    }

    public function status(): int
    {
        return $this->status;
    }

    public function headers(): array
    {
        return $this->headers;
    }
}
