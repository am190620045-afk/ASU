<?php

declare(strict_types=1);

namespace ASU\View;

interface RendererInterface
{
    public function render(string $template, array $data = []): string;
}
