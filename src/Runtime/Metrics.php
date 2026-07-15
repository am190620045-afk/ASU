<?php

declare(strict_types=1);

namespace ASU\Runtime;

final class Metrics
{
    private array $metrics = [];

    public function record(string $name, mixed $value): void
    {
        $this->metrics[$name] = $value;
    }

    public function all(): array
    {
        return $this->metrics;
    }
}
