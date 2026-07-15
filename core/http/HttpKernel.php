<?php

namespace ASU\Core\Http;

use ASU\Core\Kernel\Application;

class HttpKernel
{
    public function __construct(
        private Application $application,
        private Router $router
    ) {
    }

    public function handle(string $method, string $path): Response
    {
        $result = $this->router->dispatch($method, $path);

        if ($result instanceof Response) {
            return $result;
        }

        return new Response($result);
    }
}
