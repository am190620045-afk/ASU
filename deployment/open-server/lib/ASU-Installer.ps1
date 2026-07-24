function Install-ASURelease {
    param(
        [string]$ReleaseArchive,
        [string]$TargetPath
    )

    if (!(Test-Path $ReleaseArchive)) {
        throw "Release archive not found"
    }

    if (!(Test-Path $TargetPath)) {
        New-Item $TargetPath -ItemType Directory | Out-Null
    }

    Expand-Archive -Path $ReleaseArchive -DestinationPath $TargetPath -Force

    Write-ASULog "Release installed to $TargetPath" "SUCCESS"
}

function Remove-ASUInstallation {
    param([string]$TargetPath)

    if (Test-Path $TargetPath) {
        Remove-Item $TargetPath -Recurse -Force
        Write-ASULog "ASU installation removed" "WARN"
    }
}
