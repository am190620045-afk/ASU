<?php

namespace ASU\Core\Http;

use ASU\Core\Kernel\Application;

class HttpKernel
{
    public function __construct(
        private Application $application,
        private Router $router,
        private ControllerResultResolver $resolver = new ControllerResultResolver()
    ) {
    }

    public function handle(string $method, string $path): Response
    {
        $result = $this->router->dispatch($method, $path);

        return $this->resolver->resolve($result);
    }
}
