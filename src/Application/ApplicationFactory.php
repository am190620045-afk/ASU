<?php

declare(strict_types=1);

namespace ASU\Application;

use ASU\Container\Container;
use ASU\Database\DatabaseConnection;
use ASU\Database\DatabaseInterface;
use ASU\Security\Authenticator;
use ASU\Security\PasswordHasher;
use ASU\Security\Session;
use ASU\User\UserRepository;

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
