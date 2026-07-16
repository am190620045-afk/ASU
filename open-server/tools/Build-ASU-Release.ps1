# ==========================================
# ASU Open Server Deployment Kit
# Build-ASU-Release.ps1
# Version 0.2.0-preview
# ==========================================

$ErrorActionPreference = "Stop"

$Root = Split-Path -Parent $PSScriptRoot

Write-Host "ASU Release Pipeline"
Write-Host ""

Write-Host "1. Validate version"
& "$Root\tests\Test-ASU-Release-Version.ps1"

Write-Host "2. Validate package structure"
& "$Root\tests\Test-ASU-Package-Structure.ps1"

Write-Host "3. Generate manifest"
& "$Root\tools\Generate-ASU-Manifest.ps1"

Write-Host "4. Build package"
& "$Root\tools\Build-ASU-OSP-Package.ps1"

Write-Host "5. Generate SHA256"
& "$Root\tools\Generate-ASU-SHA256.ps1"

Write-Host "6. Validate package"
& "$Root\tests\Test-ASU-Package-Integrity.ps1"

Write-Host "7. Verify release artifacts"
& "$Root\tools\Verify-ASU-Release.ps1"

Write-Host "8. Generate release report"
& "$Root\tools\Generate-ASU-Release-Report.ps1"

Write-Host ""
Write-Host "Release pipeline completed"
