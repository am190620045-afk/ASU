Write-Host "ASU Runtime Test"
Write-Host "Checking project foundation..."

$paths = @(
    "core/bootstrap/Bootstrap.php",
    "core/kernel/Application.php",
    "core/services/ServiceContainer.php",
    "modules/core/ModuleManager.php",
    "database/connection/Database.php",
    "security/auth/Authentication.php"
)

foreach ($path in $paths) {
    if (Test-Path $path) {
        Write-Host "OK: $path"
    } else {
        Write-Host "MISSING: $path"
    }
}
