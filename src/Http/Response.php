<?php

declare(strict_types=1);

namespace ASU\Http;

final class Response
{
    /** @param array<string,string> $headers */
    public function __construct(
        private readonly string $content,
        private readonly int $statusCode = 200,
        private readonly array $headers = []
    ) {
    }

    public static function redirect(string $location): self
    {
        return new self(
            '',
            302,
            ['Location' => $location]
        );
    }

    public function content(): string
    {
        return $this->content;
    }

    public function statusCode(): int
    {
        return $this->statusCode;
    }

    /** @return array<string,string> */
    public function headers(): array
    {
        return $this->headers;
    }
}
