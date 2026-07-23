<?php

declare(strict_types=1);

namespace ASU\Application;

use ASU\Container\Container;
use ASU\Security\PasswordHasher;
use ASU\Security\Session;

final class ApplicationFactory
{
    public static function createContainer(): Container
    {
        $container = new Container();

        $container->set(
            PasswordHasher::class,
            new PasswordHasher()
        );

        $container->set(
            Session::class,
            new Session()
        );

        return $container;
    }
}
