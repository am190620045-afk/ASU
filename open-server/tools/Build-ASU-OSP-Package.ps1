# ==========================================
# ASU Open Server Deployment Kit
# Build-ASU-OSP-Package.ps1
# Version 0.2.0-preview
# ==========================================

$ErrorActionPreference = "Stop"

$Root = Split-Path -Parent $PSScriptRoot
$ReleaseName = "ASU-v0.2.0-openserver-preview"
$ReleaseFolder = Join-Path $Root "release"
$Stage = Join-Path $Root "_build"

$required = @(
    "START-ASU-INSTALL.ps1",
    "VERSION",
    "config.json",
    "README-OPEN-SERVER.md",
    "install\Install-ASU-OSP.ps1",
    "tests\Test-ASU-OSP.ps1",
    "tools\Generate-ASU-Report.ps1",
    "lib\ASU-Common.ps1"
)

foreach ($file in $required) {
    if (!(Test-Path (Join-Path $Root $file))) {
        throw "Missing file: $file"
    }
}

if (Test-Path $Stage) {
    Remove-Item $Stage -Recurse -Force
}

New-Item -ItemType Directory $Stage | Out-Null
$PackageRoot = Join-Path $Stage $ReleaseName
New-Item -ItemType Directory $PackageRoot | Out-Null

Copy-Item "$Root\*" $PackageRoot -Recurse -Force

$manifest = @{
    name = $ReleaseName
    version = (Get-Content "$Root\VERSION").Trim()
    created = (Get-Date).ToString("yyyy-MM-dd HH:mm:ss")
}

$manifest | ConvertTo-Json | Set-Content (Join-Path $PackageRoot "manifest.json")

if (!(Test-Path $ReleaseFolder)) {
    New-Item -ItemType Directory $ReleaseFolder | Out-Null
}

$zip = Join-Path $ReleaseFolder "$ReleaseName.zip"

if (Test-Path $zip) {
    Remove-Item $zip -Force
}

Compress-Archive -Path $PackageRoot -DestinationPath $zip

Get-FileHash $zip -Algorithm SHA256 |
    Select-Object -ExpandProperty Hash |
    Set-Content "$zip.sha256"

Write-Host "Build complete: $zip"
