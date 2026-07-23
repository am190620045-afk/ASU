<?php

declare(strict_types=1);

namespace ASU\Controller;

use ASU\Http\Response;
use ASU\Runtime\WebApplicationRuntime;

final class RuntimeController extends Controller
{
    public function status(): Response
    {
        $context = WebApplicationRuntime::context();

        return new Response(
            json_encode([
                'status' => 'ok',
                'runtime' => $context?->all() ?? [],
            ], JSON_THROW_ON_ERROR),
            200,
            ['Content-Type' => 'application/json; charset=utf-8']
        );
    }
}
