# ==========================================
# ASU Open Server Deployment Kit
# Install-ASU-OSP.ps1
# Version 0.6.4-preview
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

function Get-ASU-DeployPath {
    return "C:\OSPanel\home\asu.local"
}

function Test-ASU-Deployment {
    param([string]$DeployPath)

    Test-ASU-ProjectStructure $DeployPath

    if (-not (Test-Path (Join-Path $DeployPath ".osp\project.ini"))) {
        throw "OSP metadata missing: .osp\project.ini"
    }

    try {
        $response = Invoke-WebRequest `
            "http://127.0.0.1/health.php" `
            -Headers @{ Host = "asu.local" } `
            -UseBasicParsing
    }
    catch {
        throw "Health endpoint check failed: $($_.Exception.Message)"
    }

    if ($response.StatusCode -ne 200) {
        throw "Health endpoint returned invalid status"
    }
}

$project = (Resolve-Path (Join-Path $Root "..\")).Path
$payload = Join-Path $Root "payload"
$deploy = Get-ASU-DeployPath

if ($Mode -eq "VERIFY") {
    Test-ASU-Deployment $deploy
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

if (-not (Test-Path $deploy)) {
    New-Item -ItemType Directory -Path $deploy -Force | Out-Null
}
else {
    Get-ChildItem $deploy -Force | Remove-Item -Recurse -Force
}

$runtimeItems = @(".osp","VERSION","VERSION.json","config","public")
foreach ($item in $runtimeItems) {
    $source = Join-Path $project $item
    if (Test-Path $source) {
        Copy-Item -Path $source -Destination $deploy -Recurse -Force
    }
}

Set-Content (Join-Path $deploy "VERSION") $Version

Test-ASU-ProjectStructure $deploy
Write-ASU-State $project "COMPLETED"
Write-ASU-Log "Deployment completed"
Write-Host "Installation completed"
