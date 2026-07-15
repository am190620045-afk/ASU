<?php

declare(strict_types=1);

namespace ASU\Runtime;

final class ExceptionHandler
{
    public function handle(\Throwable $exception): array
    {
        return [
            'status' => 'error',
            'type' => $exception::class,
            'message' => $exception->getMessage(),
        ];
    }
}
