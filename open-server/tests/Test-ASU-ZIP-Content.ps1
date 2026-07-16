# ==========================================
# ASU Open Server Deployment Kit
# Test-ASU-ZIP-Content.ps1
# Version 0.2.0-preview
# ==========================================

$ErrorActionPreference = "Stop"

$Root = Split-Path -Parent $PSScriptRoot
$Zip = Join-Path $Root "release\ASU-v0.2.0-openserver-preview.zip"
$Temp = Join-Path $Root "_zip_test"

if (!(Test-Path $Zip)) {
    throw "ZIP package not found"
}

if (Test-Path $Temp) {
    Remove-Item $Temp -Recurse -Force
}

Expand-Archive -Path $Zip -DestinationPath $Temp

$Package = Join-Path $Temp "ASU-v0.2.0-openserver-preview"

$required = @(
    "START-ASU-INSTALL.ps1",
    "VERSION",
    "install",
    "tests",
    "tools",
    "lib",
    "payload"
)

$result = foreach ($item in $required) {
    [PSCustomObject]@{
        item = $item
        status = if(Test-Path (Join-Path $Package $item)){"OK"}else{"FAILED"}
    }
}

$result | ConvertTo-Json -Depth 5 | Set-Content (Join-Path $Root "release\zip-content-test.json")

if($result.status -contains "FAILED") {
    throw "ZIP content validation failed"
}

Write-Host "ZIP CONTENT VERIFIED"
