<?php

declare(strict_types=1);

namespace ASU\Service;

final class Discovery
{
    public function scan(array $services): array
    {
        return array_values(array_filter($services, static fn($service): bool => is_object($service)));
    }
}
