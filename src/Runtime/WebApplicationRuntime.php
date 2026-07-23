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

        try {
            $kernel->boot();

            return Bootstrap::create()->run($request);
        } finally {
            $kernel->shutdown();
        }
    }
}
