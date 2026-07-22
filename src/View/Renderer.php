<?php

declare(strict_types=1);

namespace ASU\View;

final class Renderer implements RendererInterface
{
    public function __construct(
        private readonly string $basePath
    ) {
    }

    public function render(string $template, array $data = []): string
    {
        $path = rtrim($this->basePath, '/\\') . '/' . ltrim($template, '/\\');

        if (!is_file($path)) {
            return '';
        }

        extract($data, EXTR_SKIP);

        ob_start();

        require $path;

        return (string) ob_get_clean();
    }
}
