<?php

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use ASU\Core\Http\HttpKernel;
use ASU\Core\Http\Router;
use ASU\Core\Kernel\Application;
use ASU\Tests\Runtime\RuntimeTestRunner;

$application = new Application();
$application->run();

$router = new Router();
$kernel = new HttpKernel($application, $router);

$runner = new RuntimeTestRunner();
$runner->run($kernel);

echo "ASU runtime validation passed\n";
