<?php

namespace ASU\Tests\Runtime;

use ASU\Core\Http\HttpKernel;

class AdminRouteRuntimeTest
{
    public function testAdminRoute(HttpKernel $kernel): void
    {
        $response = $kernel->handle('GET', '/admin');

        if ($response->status() !== 200) {
            throw new \RuntimeException('Admin route runtime validation failed');
        }
    }
}
