# ==========================================
# ASU Open Server Deployment Kit
# Test-ASU-Package-Structure.ps1
# Version 0.2.0-preview
# ==========================================

$Root = Split-Path -Parent $PSScriptRoot

$checks = @()

function Add-Check($name, $path) {
    $checks += [PSCustomObject]@{
        check = $name
        status = if(Test-Path $path){"OK"}else{"FAILED"}
        path = $path
    }
}

Add-Check "Installer" "$Root\START-ASU-INSTALL.ps1"
Add-Check "Version" "$Root\VERSION"
Add-Check "Install folder" "$Root\install"
Add-Check "Tests folder" "$Root\tests"
Add-Check "Tools folder" "$Root\tools"
Add-Check "Payload folder" "$Root\payload"

$report = Join-Path $Root "release\structure-test.json"
$checks | ConvertTo-Json -Depth 5 | Set-Content $report

if($checks.status -contains "FAILED") {
    throw "Package structure validation failed"
}

Write-Host "PACKAGE STRUCTURE VERIFIED"
