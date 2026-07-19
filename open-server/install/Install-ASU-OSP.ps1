# ==========================================
# ASU Open Server Deployment Kit
# Install-ASU-OSP.ps1
# Version 0.5.0-preview
# ==========================================

param(
    [string]$Config = "..\config.json",
    [string]$Version = "0.5.0",
    [ValidateSet("INSTALL", "VERIFY")]
    [string]$Mode = "INSTALL"
)

$ErrorActionPreference = "Stop"

$Root = Split-Path -Parent $PSScriptRoot
. "$Root\lib\ASU-Common.ps1"

function Test-ASU-Payload {
    param([string]$Path)

    $required = @(
        ".osp\project.ini",
        "public\index.php",
        "public\health.php"
    )

    foreach ($item in $required) {
        if (-not (Test-Path (Join-Path $Path $item))) {
            throw "Required deployment file missing: $item"
        }
    }
}

function Test-ASU-Requirements {
    param($ConfigData)

    $requirements = $ConfigData.requirements

    if ($requirements.open_server -ne "6.5.1") {
        throw "Unsupported Open Server version requirement"
    }

    if ($requirements.php -ne "8.5") {
        throw "Unsupported PHP version requirement"
    }

    if ($requirements.mysql -ne "8.4") {
        throw "Unsupported MySQL version requirement"
    }
}

function Test-ASU-Deployment {
    param([string]$ProjectPath)

    $required = @(
        "VERSION",
        "deployment-report.json",
        ".asu\deployment-state.json"
    )

    foreach ($item in $required) {
        if (-not (Test-Path (Join-Path $ProjectPath $item))) {
            throw "Deployment verification failed. Missing: $item"
        }
    }
}

$configPath = Join-Path $Root $Config
$configData = Get-Content $configPath -Raw | ConvertFrom-Json
$project = $configData.paths.project
$payload = Join-Path $Root "payload"

Test-ASU-Requirements $configData

if ($Mode -eq "VERIFY") {
    Test-ASU-Deployment $project
    Write-ASU-Log "Deployment verification completed"
    Write-Host "Deployment verification completed"
    exit
}

if (-not (Test-Path $payload)) {
    throw "Deployment payload not found"
}

Test-ASU-Payload $payload

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

Get-ChildItem $payload -Force | Copy-Item -Destination $project -Recurse -Force

Set-Content (Join-Path $project "VERSION") $Version

$report = @{
    version = $Version
    status = "completed"
    deployment = "Open Server Panel 6.5.1"
    source = "open-server/payload"
    validated = @(
        "osp/project.ini",
        "public/index.php",
        "public/health.php"
    )
}

$report | ConvertTo-Json | Set-Content (Join-Path $project "deployment-report.json")

Write-ASU-State $project "COMPLETED"
Write-ASU-Log "Deployment completed"

Write-Host "Installation completed"