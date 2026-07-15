<?php

namespace ASU\Core\Http;

interface RouteProvider
{
    public function register(Router $router): void;
}
