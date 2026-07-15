<?php

declare(strict_types=1);

namespace ASU\Runtime;

use ASU\Module\Status as ModuleStatus;

final class Status
{
    public function __construct(
        private readonly State $state,
        private readonly ?Metrics $metrics = null
    ) {
    }

    public function report(?ModuleStatus $modules = null): array
    {
        return [
            'runtime' => Metadata::get(),
            'state' => $this->state->all(),
            'metrics' => $this->metrics?->all() ?? [],
            'modules' => $modules?->report() ?? [],
        ];
    }
}
