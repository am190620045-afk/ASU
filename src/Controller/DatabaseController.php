<?php

declare(strict_types=1);

namespace ASU\Controller;

use ASU\Database\DatabaseInterface;
use ASU\Http\Response;

final class DatabaseController extends Controller
{
    public function __construct(
        private readonly DatabaseInterface $database
    ) {
    }

    public function status(): Response
    {
        try {
            $this->database->connection();

            return new Response(
                json_encode([
                    'status' => 'ok',
                    'database' => 'connected',
                ], JSON_THROW_ON_ERROR),
                200,
                ['Content-Type' => 'application/json; charset=utf-8']
            );
        } catch (\Throwable $exception) {
            return new Response(
                json_encode([
                    'status' => 'error',
                    'database' => 'unavailable',
                    'message' => $exception->getMessage(),
                ], JSON_THROW_ON_ERROR),
                503,
                ['Content-Type' => 'application/json; charset=utf-8']
            );
        }
    }
}
