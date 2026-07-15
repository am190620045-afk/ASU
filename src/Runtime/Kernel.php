<?php

declare(strict_types=1);

namespace ASU\Runtime;

use ASU\Config\Loader;
use ASU\Module\Discovery;

final class Kernel
{
    private bool $booted = false;
    private Container $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    public function boot(): array
    {
        $this->registerServices();
        $this->booted = true;

        return [
            'kernel' => 'ready',
            'booted' => $this->booted,
            'services' => ['config', 'modules'],
            'runtime' => Bootstrap::initialize(),
        ];
    }

    private function registerServices(): void
    {
        $this->container->set('config', new Loader());
        $this->container->set('modules', new Discovery());
    }
}
