<?php

declare(strict_types=1);

namespace ASU\Database;

use PDO;

interface DatabaseInterface
{
    public function connection(): PDO;
}
