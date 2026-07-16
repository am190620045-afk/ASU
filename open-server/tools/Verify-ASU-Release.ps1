# ==========================================
# ASU Open Server Deployment Kit
# Verify-ASU-Release.ps1
# Version 0.2.0-preview
# ==========================================

$ErrorActionPreference = "Stop"

$Root = Split-Path -Parent $PSScriptRoot
$Release = Join-Path $Root "release"

$checks = @()

function Add-Check($name, $ok) {
    $checks += [PSCustomObject]@{
        check = $name
        status = if($ok){"OK"}else{"FAILED"}
    }
}

Add-Check "ZIP exists" (Test-Path (Join-Path $Release "ASU-v0.2.0-openserver-preview.zip"))
Add-Check "SHA256 exists" (Test-Path (Join-Path $Release "ASU-v0.2.0-openserver-preview.zip.sha256"))
Add-Check "Manifest exists" (Test-Path (Join-Path $Release "manifest.json"))
Add-Check "Package test exists" (Test-Path (Join-Path $Release "package-test.json"))

$checks | ConvertTo-Json | Set-Content (Join-Path $Release "release-verification.json")

if($checks.status -contains "FAILED"){
    throw "Release verification failed"
}

Write-Host "RELEASE VERIFIED"
