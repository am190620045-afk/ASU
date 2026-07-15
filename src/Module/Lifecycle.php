<?php

declare(strict_types=1);

namespace ASU\Module;

interface Lifecycle
{
    public function beforeBoot(): void;

    public function afterBoot(): void;

    public function beforeShutdown(): void;

    public function afterShutdown(): void;
}
