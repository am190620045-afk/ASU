<?php

namespace ASU\Tests;

use ASU\Core\Bootstrap\Bootstrap;

class RuntimeTest
{
    public function run(): bool
    {
        $application = Bootstrap::initialize();
        return $application !== null;
    }
}
