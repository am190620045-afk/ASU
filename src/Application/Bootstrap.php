<?php

declare(strict_types=1);

namespace ASU\Application;

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

        $router->add(
            new Route(
                'GET',
                '/',
                static function () use ($homeController): Response {
                    return $homeController->index();
                }
            )
        );

        return new Application($router);
    }
}
