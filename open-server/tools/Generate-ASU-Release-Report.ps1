# ==========================================
# ASU Open Server Deployment Kit
# Generate-ASU-Release-Report.ps1
# Version 0.2.0-preview
# ==========================================

$Root = Split-Path -Parent $PSScriptRoot
$Release = Join-Path $Root "release"

$report = @"
# ASU Release Report

## Release

ASU-v0.2.0-openserver-preview

## Build Status

Generated: $(Get-Date -Format 'yyyy-MM-dd HH:mm:ss')

## Artifacts

| Item | Status |
|---|---|
| Manifest | $(if(Test-Path "$Release\manifest.json"){'OK'}else{'FAILED'}) |
| ZIP Package | $(if(Test-Path "$Release\ASU-v0.2.0-openserver-preview.zip"){'OK'}else{'FAILED'}) |
| SHA256 | $(if(Test-Path "$Release\ASU-v0.2.0-openserver-preview.zip.sha256"){'OK'}else{'FAILED'}) |
| Integrity Test | $(if(Test-Path "$Release\package-test.json"){'OK'}else{'PENDING'}) |
| Verification | $(if(Test-Path "$Release\release-verification.json"){'OK'}else{'PENDING'}) |

## Target

Open Server real environment test.
"@

$report | Set-Content (Join-Path $Release "RELEASE-REPORT.md") -Encoding UTF8

Write-Host "Release report generated"
