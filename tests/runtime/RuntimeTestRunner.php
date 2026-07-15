<?php

namespace ASU\Tests\Runtime;

use ASU\Core\Http\HttpKernel;

class RuntimeTestRunner
{
    public function run(HttpKernel $kernel): void
    {
        $tests = [
            new AdminRouteRuntimeTest(),
        ];

        foreach ($tests as $test) {
            $test->testAdminRoute($kernel);
        }
    }
}
