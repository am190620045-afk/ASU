<?php

namespace ASU\Modules\Contracts;

interface ModuleInterface
{
    public function getName(): string;

    public function register(): void;

    public function boot(): void;
}
