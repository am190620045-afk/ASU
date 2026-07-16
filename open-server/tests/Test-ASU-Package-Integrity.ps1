# ==========================================
# ASU Open Server Deployment Kit
# Test-ASU-Package-Integrity.ps1
# Version 0.2.0-preview
# ==========================================

$ErrorActionPreference = "Stop"

$Root = Split-Path -Parent $PSScriptRoot
$ReleaseFolder = Join-Path $Root "release"

$Zip = Get-ChildItem $ReleaseFolder -Filter "*.zip" | Select-Object -First 1

if (!$Zip) {
    throw "ZIP package not found"
}

$Temp = Join-Path $env:TEMP "ASU_PACKAGE_TEST"

if (Test-Path $Temp) {
    Remove-Item $Temp -Recurse -Force
}

Expand-Archive -Path $Zip.FullName -DestinationPath $Temp

$Package = Get-ChildItem $Temp | Select-Object -First 1

$required = @(
    "START-ASU-INSTALL.ps1",
    "VERSION",
    "config.json",
    "README-OPEN-SERVER.md",
    "install\Install-ASU-OSP.ps1",
    "tests\Test-ASU-OSP.ps1",
    "tools\Generate-ASU-Report.ps1",
    "lib\ASU-Common.ps1",
    "payload\VERSION",
    "payload\public\index.php"
)

$result = foreach ($file in $required) {
    [PSCustomObject]@{
        file = $file
        status = if (Test-Path (Join-Path $Package.FullName $file)) { "OK" } else { "MISSING" }
    }
}

$result | ConvertTo-Json | Set-Content (Join-Path $ReleaseFolder "package-test.json")

if ($result.status -contains "MISSING") {
    throw "Package integrity failed"
}

Write-Host "PACKAGE READY"
