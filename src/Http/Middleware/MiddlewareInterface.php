<?php

declare(strict_types=1);

namespace ASU\Http\Middleware;

use ASU\Http\Request;
use ASU\Http\Response;

interface MiddlewareInterface
{
    public function process(Request $request, callable $next): Response;
}
