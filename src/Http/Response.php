<?php

declare(strict_types=1);

namespace ASU\Http;

final class Response
{
    public function __construct(
        private readonly string $content,
        private readonly int $statusCode = 200
    ) {
    }

    public function content(): string
    {
        return $this->content;
    }

    public function statusCode(): int
    {
        return $this->statusCode;
    }
}
