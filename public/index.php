<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use ASU\Http\Request;
use ASU\Runtime\ExceptionHandler;
use ASU\Runtime\WebApplicationRuntime;

header('Content-Type: text/html; charset=utf-8');

try {
    $response = WebApplicationRuntime::handle(
        Request::fromGlobals()
    );

    http_response_code($response->statusCode());

    foreach ($response->headers() as $name => $value) {
        header($name . ': ' . $value);
    }

    echo $response->content();
} catch (\Throwable $exception) {
    $handler = new ExceptionHandler();
    http_response_code(500);
    echo $handler->handle($exception);
}
