<?php

use ASU\Core\Http\HttpKernel;
use ASU\Core\Http\Router;
use ASU\Core\Kernel\Application;

require dirname(__DIR__) . '/autoload.php';

$app = new Application();
$app->run();

$router = new Router();

$routes = require dirname(__DIR__) . '/admin/routes.php';
$routes($router, $app->services()->get('dashboard'));

$kernel = new HttpKernel($app, $router);

return $kernel->handle(
    $_SERVER['REQUEST_METHOD'] ?? 'GET',
    $_SERVER['REQUEST_URI'] ?? '/'
);
