<?php

declare(strict_types=1);

namespace ASU\Application;

use ASU\Container\Container;
use ASU\Controller\AuthController;
use ASU\Controller\DashboardController;
use ASU\Controller\DatabaseController;
use ASU\Controller\HomeController;
use ASU\Controller\RuntimeController;
use ASU\Http\Request;
use ASU\Http\Response;
use ASU\Routing\Route;
use ASU\Routing\Router;

final class Bootstrap
{
    public static function create(Container $container): Application
    {
        $router = new Router();

        $homeController = $container->get(HomeController::class);
        $authController = $container->get(AuthController::class);
        $dashboardController = $container->get(DashboardController::class);
        $runtimeController = $container->get(RuntimeController::class);
        $databaseController = $container->get(DatabaseController::class);

        $router->add(new Route('GET', '/', static fn (): Response => $homeController->index()));
        $router->add(new Route('GET', '/login', static fn (): Response => $authController->login()));
        $router->add(new Route('POST', '/login', static fn (): Response => $authController->authenticate(Request::fromGlobals())));
        $router->add(new Route('GET', '/logout', static fn (): Response => $authController->logout()));
        $router->add(new Route('GET', '/dashboard', static fn (): Response => $dashboardController->index()));
        $router->add(new Route('GET', '/status/runtime', static fn (): Response => $runtimeController->status()));
        $router->add(new Route('GET', '/status/database', static fn (): Response => $databaseController->status()));

        return new Application($router);
    }
}
