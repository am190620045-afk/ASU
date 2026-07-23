<?php

declare(strict_types=1);

namespace ASU\Application;

use ASU\Controller\AuthController;
use ASU\Controller\HomeController;
use ASU\Http\Response;
use ASU\Routing\Route;
use ASU\Routing\Router;

final class Bootstrap
{
    public static function create(): Application
    {
        $container = ApplicationFactory::createContainer();
        $router = new Router();

        $homeController = $container->get(HomeController::class);
        $authController = $container->get(AuthController::class);

        $router->add(
            new Route(
                'GET',
                '/',
                static function () use ($homeController): Response {
                    return $homeController->index();
                }
            )
        );

        $router->add(
            new Route(
                'GET',
                '/login',
                static function () use ($authController): Response {
                    return $authController->login();
                }
            )
        );

        $router->add(
            new Route(
                'GET',
                '/logout',
                static function () use ($authController): Response {
                    return $authController->logout();
                }
            )
        );

        return new Application($router);
    }
}
