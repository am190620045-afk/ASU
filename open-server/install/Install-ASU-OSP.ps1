# ==========================================
# ASU Open Server Deployment Kit
# Install-ASU-OSP.ps1
# Version 0.2.0-preview
# ==========================================

param(
    [string]$Config = "..\config.json",
    [string]$Version = "0.2.0"
)

$ErrorActionPreference = "Stop"

$Root = Split-Path -Parent $PSScriptRoot
. "$Root\lib\ASU-Common.ps1"

$configPath = Join-Path $Root $Config
$configData = Get-Content $configPath -Raw | ConvertFrom-Json
$project = $configData.paths.project

Initialize-ASU-Runtime $project

$existing = Test-Path (Join-Path $project "VERSION")

if ($existing) {
    Write-Host "Existing ASU installation detected"
    Write-Host "1. Backup and upgrade"
    Write-Host "2. Cancel"

    $choice = Read-Host "Select"

    if ($choice -ne "1") {
        Write-Host "Cancelled"
        exit
    }

    New-ASU-Backup $project
    Write-ASU-State $project "UPGRADE_RUNNING"
}
else {
    Write-ASU-State $project "INSTALL_RUNNING"
}

$payload = Join-Path $Root "payload"

if (Test-Path $payload) {
    Copy-Item "$payload\*" $project -Recurse -Force
}

Set-Content (Join-Path $project "VERSION") $Version

Write-ASU-State $project "COMPLETED"
Write-ASU-Log "Deployment completed"

Write-Host "Installation completed"
