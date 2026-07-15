param()

Write-Host "ASU Composer Runtime Build"

if (-not (Test-Path "composer.json")) {
    throw "composer.json not found"
}

composer install --no-interaction --prefer-dist --optimize-autoloader

Write-Host "ASU runtime dependencies prepared"
