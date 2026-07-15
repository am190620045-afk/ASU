<?php

namespace ASU\Core\Http;

class ControllerResultResolver
{
    public function resolve(mixed $result): Response
    {
        if ($result instanceof Response) {
            return $result;
        }

        return new Response($result);
    }
}
