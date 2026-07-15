<?php

namespace ASU\Tests;

class ModuleTest
{
    public function run(): bool
    {
        return class_exists('ASU\\Modules\\Core\\ModuleManager');
    }
}
