<?php

declare(strict_types=1);

namespace ASU\Application;

use ASU\Controller\AuthController;
use ASU\Controller\HomeController;
use ASU\Http\Request;
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
            new Route('GET', '/', static fn (): Response => $homeController->index())
        );

        $router->add(
            new Route('GET', '/login', static fn (): Response => $authController->login())
        );

        $router->add(
            new Route('POST', '/login', static fn (): Response => $authController->authenticate(Request::fromGlobals()))
        );

        $router->add(
            new Route('GET', '/logout', static fn (): Response => $authController->logout())
        );

        return new Application($router);
    }
}
