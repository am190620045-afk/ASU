<?php

declare(strict_types=1);

namespace ASU\Runtime;

final class PerformanceReport
{
    public function __construct(private readonly Performance $performance)
    {
    }

    public function generate(float $bootSeconds): array
    {
        return [
            'runtime' => '0.2.0-beta-runtime.2',
            'performance' => $this->performance->check($bootSeconds),
        ];
    }
}
