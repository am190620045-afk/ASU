<?php

declare(strict_types=1);

namespace ASU\Config;

final class DatabaseConfig
{
    public function __construct(
        private readonly array $values
    ) {
    }

    /** @return array<string, mixed> */
    public function values(): array
    {
        return $this->values;
    }
}
