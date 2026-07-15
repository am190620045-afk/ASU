<?php

declare(strict_types=1);

namespace ASU\Runtime;

final class Kernel
{
    private bool $booted = false;

    public function boot(): array
    {
        $this->booted = true;

        return [
            'kernel' => 'ready',
            'booted' => $this->booted,
            'runtime' => Bootstrap::initialize(),
        ];
    }
}
