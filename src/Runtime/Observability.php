<?php

declare(strict_types=1);

namespace ASU\Runtime;

final class Observability
{
    public function __construct(
        private readonly Metrics $metrics,
        private readonly Performance $performance
    ) {
    }

    public function report(float $bootSeconds): array
    {
        return [
            'metrics' => $this->metrics->all(),
            'performance' => $this->performance->check($bootSeconds),
        ];
    }
}
