# ASU Open Server Deployment Kit
# START-ASU-INSTALL.ps1
# Version 0.2.0-preview

$ErrorActionPreference = "Stop"

$Root = Split-Path -Parent $MyInvocation.MyCommand.Path

Write-Host "ASU Open Server Deployment Kit"
Write-Host "Version 0.2.0-preview"
Write-Host ""

Write-Host "1. Preflight environment check"
Write-Host "2. Diagnose environment"
Write-Host "3. Preview deployment"
Write-Host "4. Install / Upgrade"
Write-Host "5. Generate report"
Write-Host "6. Validate package"

$choice = Read-Host "Choice"

switch ($choice) {
    "1" { & "$Root\tests\Preflight-ASU-OSP.ps1" }
    "2" { & "$Root\tests\Test-ASU-OSP.ps1" }
    "3" {
        Write-Host "Preview mode"
        Get-ChildItem "$Root\payload" -Recurse
    }
    "4" { & "$Root\install\Install-ASU-OSP.ps1" }
    "5" { & "$Root\tools\Generate-ASU-Report.ps1" }
    "6" { & "$Root\tests\Test-ASU-Package-Integrity.ps1" }
    default { Write-Host "Exit" }
}
