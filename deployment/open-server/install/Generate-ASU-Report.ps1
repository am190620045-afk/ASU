$Root = Split-Path $PSScriptRoot -Parent

. "$Root\lib\ASU-Deployment.Common.ps1"

$config = Get-ASUConfig $Root
$version = Get-ASUVersion $Root

$reportDir = Join-Path $Root "reports"

if (!(Test-Path $reportDir)) {
    New-Item $reportDir -ItemType Directory | Out-Null
}

$report = @"
ASU Deployment Report
=====================

Version: $version
Date: $(Get-Date)
Environment:
PHP Target: $($config.environment.php_target_version)
MySQL: $($config.environment.mysql_version)
Server: $($config.environment.server)

Validation:
See test-result.json
"@

$file = Join-Path $reportDir "ASU-report.html"

$report | Out-File $file -Encoding utf8

Write-ASULog "Report generated: $file" "SUCCESS"
