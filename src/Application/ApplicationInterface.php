<?php

declare(strict_types=1);

namespace ASU\Application;

use ASU\Http\Request;
use ASU\Http\Response;

interface ApplicationInterface
{
    public function run(Request $request): Response;
}
