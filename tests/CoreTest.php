<?php

namespace ASU\Tests;

class CoreTest
{
    public function run(): bool
    {
        return class_exists('ASU\\Core\\Kernel\\Application');
    }
}
