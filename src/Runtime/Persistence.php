<?php

declare(strict_types=1);

namespace ASU\Runtime;

final class Persistence
{
    public function __construct(private readonly string $file)
    {
    }

    public function save(array $state): void
    {
        file_put_contents($this->file, json_encode($state, JSON_PRETTY_PRINT));
    }

    public function load(): array
    {
        if (!is_file($this->file)) {
            return [];
        }

        $data = json_decode((string) file_get_contents($this->file), true);

        return is_array($data) ? $data : [];
    }
}
