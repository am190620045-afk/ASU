<?php

declare(strict_types=1);

namespace ASU\Runtime;

final class RuntimeContext
{
    /** @var array<string,mixed> */
    private array $values = [];

    public function __construct()
    {
        $this->values = [
            'request_id' => bin2hex(random_bytes(8)),
            'started_at' => microtime(true),
            'environment' => 'web',
        ];
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return $this->values[$key] ?? $default;
    }

    public function set(string $key, mixed $value): void
    {
        $this->values[$key] = $value;
    }

    /** @return array<string,mixed> */
    public function all(): array
    {
        return $this->values;
    }
}
