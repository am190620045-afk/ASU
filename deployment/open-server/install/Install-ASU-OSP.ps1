$Root = Split-Path $PSScriptRoot -Parent

. "$Root\lib\ASU-Deployment.Common.ps1"

Write-ASULog "Starting ASU Open Server deployment"

$config = Get-ASUConfig $Root
$packageVersion = Get-ASUVersion $Root
$projectPath = Get-ASUProjectPath $config

Write-ASULog "Package version: $packageVersion"
Write-ASULog "Target project: $projectPath"

$backupPath = Join-Path $Root "backups"

if (Test-Path $projectPath) {

    Write-ASULog "Existing ASU installation detected" "WARN"

    $choice = Read-Host @"
Existing ASU installation found.

1 - Backup and Update
2 - Backup and Reinstall
3 - Cancel

Select action
"@

    switch ($choice) {

        "1" {
            Backup-ASUProject $projectPath $packageVersion $backupPath
            Write-ASULog "Update workflow selected"
        }

        "2" {
            Backup-ASUProject $projectPath $packageVersion $backupPath
            Write-ASULog "Reinstall workflow selected"
        }

        default {
            Write-ASULog "Deployment cancelled" "WARN"
            exit 0
        }
    }
}
else {
    Write-ASULog "Fresh installation detected"
}

Write-ASULog "Deployment files preparation completed" "SUCCESS"

& "$PSScriptRoot\Test-ASU-OSP.ps1"
& "$PSScriptRoot\Generate-ASU-Report.ps1"

Write-ASULog "ASU deployment finished" "SUCCESS"
