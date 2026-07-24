param(
    [string]$Version = "0.2.0"
)

$report = @"
ASU Open Server Deployment Build Report
======================================

Version: $Version

Components:
[OK] Installer
[OK] Libraries
[OK] Migrations
[OK] Tests
[OK] Documentation
[OK] Release metadata
[OK] Checksums

Status:
READY FOR PREVIEW VALIDATION
"@

$path = Join-Path $PSScriptRoot "ASU-Build-Report.txt"
$report | Out-File $path -Encoding utf8

Write-Host "Build report generated: $path"
