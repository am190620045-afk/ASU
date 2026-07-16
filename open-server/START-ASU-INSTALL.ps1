# ASU Open Server Deployment Kit
# START-ASU-INSTALL.ps1
# Version 0.2.0-preview

$ErrorActionPreference = "Stop"

$Root = Split-Path -Parent $MyInvocation.MyCommand.Path

Write-Host "ASU Open Server Deployment Kit"
Write-Host "Version 0.2.0-preview"
Write-Host ""

Write-Host "1. Diagnose environment"
Write-Host "2. Preview deployment"
Write-Host "3. Install / Upgrade"
Write-Host "4. Generate report"

$choice = Read-Host "Choice"

switch ($choice) {
  "1" { & "$Root\tests\Test-ASU-OSP.ps1" }
  "3" { & "$Root\install\Install-ASU-OSP.ps1" }
  "4" { & "$Root\tools\Generate-ASU-Report.ps1" }
  default { Write-Host "Exit" }
}
