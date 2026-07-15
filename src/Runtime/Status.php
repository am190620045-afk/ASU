<?php

declare(strict_types=1);

namespace ASU\Runtime;

use ASU\Module\Status as ModuleStatus;

final class Status
{
    public function __construct(private readonly State $state)
    {
    }

    public function report(?ModuleStatus $modules = null): array
    {
        return [
            'runtime' => Metadata::get(),
            'state' => $this->state->all(),
            'modules' => $modules?->report() ?? [],
        ];
    }
}
