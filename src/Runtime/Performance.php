<?php

declare(strict_types=1);

namespace ASU\Runtime;

final class Performance
{
    public function __construct(private readonly float $threshold = 1.0)
    {
    }

    public function check(float $seconds): array
    {
        return [
            'boot_seconds' => $seconds,
            'threshold' => $this->threshold,
            'status' => $seconds <= $this->threshold ? 'ok' : 'slow',
        ];
    }
}
