# ==========================================
# ASU Open Server Deployment Kit
# Test-ASU-OSP.ps1
# Version 0.2.0-preview
# ==========================================

$ErrorActionPreference = "Stop"

$Root = Split-Path -Parent $PSScriptRoot
. "$Root\lib\ASU-Common.ps1"

$result = @{
    timestamp = (Get-Date).ToString("yyyy-MM-dd HH:mm:ss")
    open_server = $false
    php = ""
    mysql = ""
    project = $false
    osp = $false
}

if (Test-Path "C:\OSPanel") {
    $result.open_server = $true
}

try {
    $result.php = (php -v 2>$null | Select-Object -First 1)
} catch {}

try {
    $result.mysql = (mysql --version 2>$null)
} catch {}

$config = Get-Content "$Root\config.json" -Raw | ConvertFrom-Json
$project = $config.paths.project

$result.project = Test-Path $project
$result.osp = Test-Path (Join-Path $project ".osp\project.ini")

$reportDir = Join-Path $Root "reports"
if (!(Test-Path $reportDir)) {
    New-Item -ItemType Directory $reportDir | Out-Null
}

$result | ConvertTo-Json -Depth 5 | Set-Content (Join-Path $reportDir "environment-report.json")

$result
