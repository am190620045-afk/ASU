<?php

declare(strict_types=1);

namespace ASU\Module;

final class Status
{
    public function __construct(private readonly Registry $registry)
    {
    }

    public function report(): array
    {
        return [
            'total' => count($this->registry->all()),
            'enabled' => count($this->registry->enabled()),
            'modules' => $this->registry->enabled(),
        ];
    }
}
