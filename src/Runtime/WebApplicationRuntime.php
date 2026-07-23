<?php

declare(strict_types=1);

namespace ASU\Runtime;

use ASU\Application\ApplicationFactory;
use ASU\Application\Bootstrap;
use ASU\Http\Middleware\AuthMiddleware;
use ASU\Http\Middleware\MiddlewarePipeline;
use ASU\Http\Middleware\RequestIdMiddleware;
use ASU\Http\Middleware\RuntimeContextMiddleware;
use ASU\Http\Middleware\SecurityHeadersMiddleware;
use ASU\Http\Request;
use ASU\Http\Response;
use ASU\Security\AuthGuard;

final class WebApplicationRuntime
{
    private static ?RuntimeContext $context = null;

    public static function handle(Request $request): Response
    {
        $kernel = new Kernel();
        self::$context = new RuntimeContext();

        $container = ApplicationFactory::createContainer();

        $pipeline = new MiddlewarePipeline();
        $pipeline->add(new RequestIdMiddleware());
        $pipeline->add(new RuntimeContextMiddleware());
        $pipeline->add(new SecurityHeadersMiddleware());
        $pipeline->add(
            new AuthMiddleware(
                $container->get(AuthGuard::class)
            )
        );

        try {
            $kernel->boot();

            self::$context->set('request_method', $request->method());
            self::$context->set('request_uri', $request->uri());

            return $pipeline->handle(
                $request,
                static fn (Request $request): Response => Bootstrap::create()->run($request)
            );
        } finally {
            $kernel->shutdown();
        }
    }

    public static function context(): ?RuntimeContext
    {
        return self::$context;
    }
}
