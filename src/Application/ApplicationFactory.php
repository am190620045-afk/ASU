<?php

declare(strict_types=1);

namespace ASU\Application;

use ASU\Config\ConfigRepository;
use ASU\Config\DatabaseConfig;
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

        $configRepository = new ConfigRepository();

        $databaseConfig = new DatabaseConfig(
            $configRepository->database()
        );

        $container->set(
            DatabaseConfig::class,
            $databaseConfig
        );

        $database = new DatabaseConnection(
            $databaseConfig->values()
        );

        $container->set(
            DatabaseInterface::class,
            $database
        );

        $container->set(
            UserRepository::class,
            new UserRepository($database)
        );

        $container->set(
            PasswordHasher::class,
            new PasswordHasher()
        );

        $container->set(
            Session::class,
            new Session()
        );

        $container->set(
            Authenticator::class,
            new Authenticator(
                $container->get(UserRepository::class),
                $container->get(PasswordHasher::class),
                $container->get(Session::class)
            )
        );

        return $container;
    }
}
