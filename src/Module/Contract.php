<?php

declare(strict_types=1);

namespace ASU\Module;

interface Contract
{
    public function register(): void;

    public function boot(): void;

    public function shutdown(): void;
}
