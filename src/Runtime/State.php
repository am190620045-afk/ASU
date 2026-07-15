<?php

declare(strict_types=1);

namespace ASU\Runtime;

final class State
{
    private array $state = [];

    public function set(string $key, mixed $value): void
    {
        $this->state[$key] = $value;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return $this->state[$key] ?? $default;
    }

    public function all(): array
    {
        return $this->state;
    }
}
