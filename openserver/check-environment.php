<?php

declare(strict_types=1);

header('Content-Type: text/plain; charset=utf-8');

$requiredPhp = '8.3.0';
$currentPhp = PHP_VERSION;

function checkVersion(string $current, string $required): string
{
    return version_compare($current, $required, '>=') ? 'OK' : 'FAIL';
}

echo "ASU Environment Check\n";
echo "=====================\n\n";

echo "PHP Version: {$currentPhp}\n";
echo "Minimum PHP 8.3: " . checkVersion($currentPhp, $requiredPhp) . "\n\n";

$extensions = [
    'pdo',
    'pdo_mysql',
    'mbstring',
    'openssl',
    'curl',
    'intl',
    'json',
    'fileinfo',
    'zip'
];

echo "Extensions:\n";
foreach ($extensions as $extension) {
    echo sprintf("%-12s %s\n", $extension, extension_loaded($extension) ? 'OK' : 'MISSING');
}

echo "\nRuntime target: Open Server Panel 6.5.1 / Apache / PHP 8.5 / MySQL 8.4\n";
