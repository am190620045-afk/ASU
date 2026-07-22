<?php

declare(strict_types=1);

namespace ASU\Controller;

use ASU\Http\Response;
use ASU\View\RendererInterface;

final class HomeController extends Controller
{
    public function __construct(
        private readonly RendererInterface $renderer
    ) {
    }

    public function index(): Response
    {
        return new Response(
            $this->renderer->render('home/index.php')
        );
    }
}
