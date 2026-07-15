<?php

namespace ASU\Core\Config;

class ConfigLoader
{
    public function load(string $file): array
    {
        return file_exists($file) ? parse_ini_file($file, true) : [];
    }
}
