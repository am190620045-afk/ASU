<?php

declare(strict_types=1);

namespace ASU\Application;

use ASU\Controller\HomeController;
use ASU\Http\Request;
use ASU\Http\Response;
use ASU\Http\Response as HttpResponse;
use ASU\Routing\Route;
use ASU\Routing\Router;
use ASU\View\Renderer;

final class Bootstrap
{
    public static function create(): Application
    {
        $router = new Router();

        $renderer = new Renderer(
            dirname(__DIR__, 2) . '/templates'
        );

        $controller = new HomeController($renderer);

        $router->add(
            new Route(
                'GET',
                '/',
                static function (Request $request) use ($controller): Response {
                    return $controller->index();
                }
            )
        );

        return new Application($router);
    }
}
