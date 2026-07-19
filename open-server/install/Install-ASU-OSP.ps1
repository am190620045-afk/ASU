# ==========================================
# ASU Open Server Deployment Kit
# Install-ASU-OSP.ps1
# Version 0.6.0-preview
# ==========================================

param(
    [string]$Version = "0.6.0",
    [ValidateSet("INSTALL", "VERIFY")]
    [string]$Mode = "INSTALL"
)

$ErrorActionPreference = "Stop"

$Root = Split-Path -Parent $PSScriptRoot
. "$Root\lib\ASU-Common.ps1"

function Test-ASU-ProjectStructure {
    param([string]$Path)

    $required = @(
        "VERSION",
        "config\runtime.php",
        "config\app.php",
        "public\index.php",
        "public\health.php"
    )

    foreach ($item in $required) {
        if (-not (Test-Path (Join-Path $Path $item))) {
            throw "ASU runtime file missing: $item"
        }
    }
}

function Test-ASU-Payload {
    param([string]$Path)

    $required = @(
        ".osp\project.ini",
        "public\index.php",
        "public\health.php",
        "config\runtime.php",
        "config\app.php"
    )

    foreach ($item in $required) {
        if (-not (Test-Path (Join-Path $Path $item))) {
            throw "Required deployment file missing: $item"
        }
    }
}

function Test-ASU-Deployment {
    param([string]$ProjectPath)

    Test-ASU-ProjectStructure $ProjectPath

    $metadata = @(
        "VERSION",
        "VERSION.json",
        "deployment-report.json",
        ".asu\deployment-state.json"
    )

    foreach ($item in $metadata) {
        if (-not (Test-Path (Join-Path $ProjectPath $item))) {
            Write-Host "Optional deployment metadata missing: $item"
        }
    }

    try {
        $response = Invoke-WebRequest "http://asu.local/health.php" -UseBasicParsing
        if ($response.StatusCode -ne 200) {
            throw "Health endpoint returned invalid status"
        }
    }
    catch {
        throw "Runtime health verification failed"
    }
}

$project = (Resolve-Path (Join-Path $Root "..\.." )).Path
$payload = Join-Path $Root "payload"

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
    architecture = "config-runtime"
    validated = @(
        "VERSION",
        "config/runtime.php",
        "config/app.php",
        "public/index.php",
        "public/health.php",
        "runtime-health"
    )
}

$report | ConvertTo-Json | Set-Content (Join-Path $project "deployment-report.json")

Write-ASU-State $project "COMPLETED"
Write-ASU-Log "Deployment completed"

Write-Host "Installation completed"