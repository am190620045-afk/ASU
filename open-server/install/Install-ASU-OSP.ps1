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
    foreach ($item in @("VERSION","config\runtime.php","config\app.php","public\index.php","public\health.php")) {
        if (-not (Test-Path (Join-Path $Path $item))) {
            throw "ASU runtime file missing: $item"
        }
    }
}

function Test-ASU-Payload {
    param([string]$Path)
    foreach ($item in @(".osp\project.ini","public\index.php","public\health.php")) {
        if (-not (Test-Path (Join-Path $Path $item))) {
            throw "Required deployment file missing: $item"
        }
    }
}

function Test-ASU-Deployment {
    param([string]$ProjectPath)
    Test-ASU-ProjectStructure $ProjectPath
    $response = Invoke-WebRequest "http://asu.local/health.php" -UseBasicParsing
    if ($response.StatusCode -ne 200) { throw "Health endpoint returned invalid status" }
}

$project = (Resolve-Path (Join-Path $Root "..\")).Path
$payload = Join-Path $Root "payload"

if ($Mode -eq "VERIFY") {
    Test-ASU-Deployment $project
    Write-ASU-Log "Deployment verification completed"
    Write-Host "Deployment verification completed"
    exit
}

Test-ASU-Payload $payload
Initialize-ASU-Runtime $project

if (Test-Path (Join-Path $project "VERSION")) {
    Write-Host "Existing ASU installation detected"
    New-ASU-Backup $project
    Write-ASU-State $project "UPGRADE_RUNNING"
}
else {
    Write-ASU-State $project "INSTALL_RUNNING"
}

Get-ChildItem $payload -Force | Copy-Item -Destination $project -Recurse -Force
Set-Content (Join-Path $project "VERSION") $Version

Test-ASU-ProjectStructure $project
Write-ASU-State $project "COMPLETED"
Write-ASU-Log "Deployment completed"
Write-Host "Installation completed"
