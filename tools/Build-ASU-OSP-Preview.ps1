# ==========================================
# ASU Open Server Preview Release Builder
# Build-ASU-OSP-Preview.ps1
# Version 0.2.0-preview
# ==========================================

$ErrorActionPreference = "Stop"

$Root = Split-Path -Parent $PSScriptRoot
$Source = Join-Path $Root "open-server"
$Out = Join-Path $Root "release"
$Zip = Join-Path $Out "ASU-v0.2.0-openserver-preview.zip"

if (!(Test-Path $Out)) {
    New-Item -ItemType Directory -Path $Out | Out-Null
}

$required = @(
    "START-ASU-INSTALL.ps1",
    "install/Install-ASU-OSP.ps1",
    "lib/ASU-Common.ps1",
    "config.json",
    "payload/VERSION",
    "payload/public/index.php"
)

foreach ($item in $required) {
    if (!(Test-Path (Join-Path $Source $item))) {
        throw "Missing package component: $item"
    }
}

if (Test-Path $Zip) {
    Remove-Item $Zip -Force
}

Compress-Archive -Path "$Source/*" -DestinationPath $Zip

$hash = Get-FileHash $Zip -Algorithm SHA256
$hash.Hash | Set-Content "$Zip.sha256"

Write-Host "Created: $Zip"
Write-Host "SHA256: $($hash.Hash)"
