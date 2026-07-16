# ==========================================
# ASU Open Server Deployment Kit
# BUILD-RELEASE.ps1
# Version 0.2.0-preview
# ==========================================

$Root = Split-Path -Parent $MyInvocation.MyCommand.Path

& "$Root\tools\Build-ASU-Release.ps1"

Write-Host ""
Write-Host "ASU release build finished"
