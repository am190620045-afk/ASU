$Root = Split-Path $PSScriptRoot -Parent

. "$Root\lib\ASU-Deployment.Common.ps1"

Write-ASULog "Starting ASU Open Server validation"

$config = Get-ASUConfig $Root
$project = Get-ASUProjectPath $config

$result = [ordered]@{
    timestamp = (Get-Date).ToString("s")
    status = "PASS"
    checks = [ordered]@{}
}

if (Test-Path $project) {
    $result.checks.project = "OK"
} else {
    $result.checks.project = "FAILED"
    $result.status = "FAIL"
}

$osp = $config.open_server.osp_config.Replace("{base_dir}", $project)

if (Test-Path $osp) {
    $result.checks.osp = "OK"
} else {
    $result.checks.osp = "FAILED"
    $result.status = "FAIL"
}

$reportDir = Join-Path $Root "reports"

if (!(Test-Path $reportDir)) {
    New-Item $reportDir -ItemType Directory | Out-Null
}

$result | ConvertTo-Json -Depth 5 | Out-File "$reportDir\test-result.json" -Encoding utf8

Write-ASULog "Validation completed: $($result.status)" $result.status
