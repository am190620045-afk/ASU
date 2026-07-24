param(
    [string]$Root = (Split-Path $PSScriptRoot -Parent)
)

Write-Host "ASU Open Server Integration Test"
Write-Host ""

$tests = @(
    "Test-FreshInstall.ps1",
    "Test-Upgrade.ps1",
    "Test-Rollback.ps1"
)

foreach($test in $tests){
    $path = Join-Path $PSScriptRoot $test

    if(Test-Path $path){
        Write-Host "[FOUND] $test"
    }
    else {
        Write-Host "[MISSING] $test"
    }
}

Write-Host "Integration test preparation completed"
