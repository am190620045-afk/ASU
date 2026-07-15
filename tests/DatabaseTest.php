<?php

namespace ASU\Tests;

class DatabaseTest
{
    public function run(): bool
    {
        return class_exists('ASU\\Database\\Connection\\Database');
    }
}
