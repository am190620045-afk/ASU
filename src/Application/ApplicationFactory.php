<?php

declare(strict_types=1);

namespace ASU\Application;

use ASU\Config\ConfigRepository;
use ASU\Config\DatabaseConfig;
use ASU\Container\Container;
use ASU\Controller\AuthController;
use ASU\Controller\DashboardController;
use ASU\Controller\DatabaseController;
use ASU\Controller\HomeController;
use ASU\Controller\RuntimeController;
use ASU\Database\DatabaseConnection;
use ASU\Database\DatabaseInterface;
use ASU\Security\AuthGuard;
use ASU\Security\Authenticator;
use ASU\Security\PasswordHasher;
use ASU\Security\Session;
use ASU\User\UserRepository;
use ASU\View\Renderer;
use ASU\View\RendererInterface;

final class ApplicationFactory
{
    public static function createContainer(): Container
    {
        $container = new Container();

        $databaseConfig = new DatabaseConfig(
            (new ConfigRepository())->database()
        );

        $container->set(DatabaseConfig::class, $databaseConfig);

        $database = new DatabaseConnection(
            $databaseConfig->values()
        );

        $container->set(DatabaseInterface::class, $database);
        $container->set(UserRepository::class, new UserRepository($database));
        $container->set(PasswordHasher::class, new PasswordHasher());
        $container->set(Session::class, new Session());

        $container->set(
            Authenticator::class,
            new Authenticator(
                $container->get(UserRepository::class),
                $container->get(PasswordHasher::class),
                $container->get(Session::class)
            )
        );

        $renderer = new Renderer(
            dirname(__DIR__, 2) . '/templates'
        );

        $container->set(RendererInterface::class, $renderer);
        $container->set(HomeController::class, new HomeController($renderer));

        $container->set(
            AuthController::class,
            new AuthController(
                $renderer,
                $container->get(Authenticator::class)
            )
        );

        $container->set(
            AuthGuard::class,
            new AuthGuard(
                $container->get(Session::class)
            )
        );

        $container->set(
            DashboardController::class,
            new DashboardController(
                $renderer,
                $container->get(Session::class)
            )
        );

        $container->set(
            RuntimeController::class,
            new RuntimeController()
        );

        $container->set(
            DatabaseController::class,
            new DatabaseController(
                $container->get(DatabaseInterface::class)
            )
        );

        return $container;
    }
}
