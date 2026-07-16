function Restore-ASUBackup {

    param(
        [string]$BackupArchive,
        [string]$TargetPath
    )

    if (!(Test-Path $BackupArchive)) {
        throw "Backup archive not found"
    }

    if (!(Test-Path $TargetPath)) {
        New-Item $TargetPath -ItemType Directory | Out-Null
    }

    Expand-Archive -Path $BackupArchive -DestinationPath $TargetPath -Force

    Write-Host "ASU rollback completed"
}
