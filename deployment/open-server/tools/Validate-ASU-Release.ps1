param(
    [string]$Root = (Split-Path $PSScriptRoot -Parent)
)

Write-Host "ASU Open Server Release Validation"
Write-Host ""

$required = @(
    "README-OPEN-SERVER.md",
    "VERSION",
    "config.json",
    "install",
    "lib",
    "migrations",
    "deployment\release.json",
    "deployment\manifest.json",
    "checksums\SHA256SUMS.txt"
)

$failed = $false

foreach($item in $required){
    $path = Join-Path $Root $item

    if(Test-Path $path){
        Write-Host "[OK] $item"
    }
    else {
        Write-Host "[FAIL] $item"
        $failed = $true
    }
}

if($failed){
    Write-Host "Release validation failed"
    exit 1
}

Write-Host "Release validation passed"
