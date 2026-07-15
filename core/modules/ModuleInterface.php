<?php

namespace ASU\Core\Modules;

interface ModuleInterface
{
    public function getName(): string;

    public function register(): void;

    public function boot(): void;
}
