<?php

declare(strict_types=1);

namespace ASU\Runtime;

final class MetricsReport
{
    public function __construct(private readonly Metrics $metrics)
    {
    }

    public function generate(): array
    {
        return [
            'runtime' => '0.2.0-beta-runtime.2',
            'metrics' => $this->metrics->all(),
        ];
    }
}
