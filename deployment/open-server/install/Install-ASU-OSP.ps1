$Root = Split-Path $PSScriptRoot -Parent

. "$Root\lib\ASU-Deployment.Common.ps1"
. "$Root\lib\ASU-Version.ps1"
. "$Root\lib\ASU-Installer.ps1"
. "$Root\lib\ASU-Rollback.ps1"
. "$Root\lib\ASU-Migration.ps1"
. "$Root\lib\ASU-Release.ps1"

Write-ASULog "Starting ASU Open Server deployment"

$config = Get-ASUConfig $Root
$packageVersion = Get-ASUVersion $Root
$projectPath = Get-ASUProjectPath $config

if (Test-Path $projectPath) {

    $installedVersion = Get-InstalledASUVersion $projectPath
    $mode = Compare-ASUVersion $installedVersion $packageVersion

    Write-ASULog "Installed: $installedVersion Package: $packageVersion Mode: $mode"

    if ($mode -eq "UPDATE") {
        Invoke-ASUMigration $Root $installedVersion $packageVersion
    }

    $choice = Read-Host "1 Update  2 Reinstall  3 Cancel"

    if ($choice -eq "1" -or $choice -eq "2") {
        Backup-ASUProject $projectPath $installedVersion "$Root\backups"
    }
    else {
        Write-ASULog "Deployment cancelled" "WARN"
        exit 0
    }
}

$release = Get-ASUReleaseArchive $Root
Install-ASURelease $release $projectPath

& "$PSScriptRoot\Test-ASU-OSP.ps1"
& "$PSScriptRoot\Generate-ASU-Report.ps1"

Write-ASULog "ASU deployment finished" "SUCCESS"
