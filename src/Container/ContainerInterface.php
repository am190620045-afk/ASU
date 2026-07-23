<?php

declare(strict_types=1);

namespace ASU\Container;

interface ContainerInterface
{
    public function get(string $id): object;
}
