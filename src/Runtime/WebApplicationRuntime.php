<?php

declare(strict_types=1);

namespace ASU\Runtime;

use ASU\Application\Bootstrap;
use ASU\Http\Request;
use ASU\Http\Response;

final class WebApplicationRuntime
{
    public static function handle(Request $request): Response
    {
        $kernel = new Kernel();
        $context = new RuntimeContext();

        try {
            $kernel->boot();

            $context->set('request_method', $request->method());
            $context->set('request_uri', $request->uri());

            return Bootstrap::create()->run($request);
        } finally {
            $kernel->shutdown();
        }
    }
}
