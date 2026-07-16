# ==========================================
# ASU Open Server Deployment Kit
# Test-ASU-Release-Version.ps1
# Version 0.2.0-preview
# ==========================================

$ErrorActionPreference = "Stop"

$Root = Split-Path -Parent $PSScriptRoot

$versionFile = Join-Path $Root "VERSION"
$payloadVersionFile = Join-Path $Root "payload\VERSION"

$result = @()

function Add-VersionCheck($name, $a, $b) {
    $result += [PSCustomObject]@{
        check = $name
        status = if($a -eq $b){"OK"}else{"FAILED"}
        expected = $a
        actual = $b
    }
}

if(!(Test-Path $versionFile) -or !(Test-Path $payloadVersionFile)) {
    throw "Version files missing"
}

$rootVersion = (Get-Content $versionFile).Trim()
$payloadVersion = (Get-Content $payloadVersionFile).Trim()

Add-VersionCheck "Payload version match" $rootVersion $payloadVersion

$result | ConvertTo-Json -Depth 5 |
    Set-Content (Join-Path $Root "release\version-test.json")

if($result.status -contains "FAILED") {
    throw "Version validation failed"
}

Write-Host "VERSION VERIFIED"
