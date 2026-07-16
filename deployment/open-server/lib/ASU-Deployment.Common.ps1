function Get-ASURoot {
    return Split-Path $PSScriptRoot -Parent
}

function Get-ASUVersion {
    param([string]$Root)

    $versionFile = Join-Path $Root "VERSION"

    if (!(Test-Path $versionFile)) {
        throw "VERSION file not found"
    }

    return (Get-Content $versionFile).Trim()
}

function Get-ASUConfig {
    param([string]$Root)

    $configFile = Join-Path $Root "config.json"

    if (!(Test-Path $configFile)) {
        throw "config.json file not found"
    }

    return Get-Content $configFile -Raw | ConvertFrom-Json
}

function Write-ASULog {
    param(
        [string]$Message,
        [string]$Level = "INFO"
    )

    $root = Split-Path $PSScriptRoot -Parent
    $logDir = Join-Path $root "logs"

    if (!(Test-Path $logDir)) {
        New-Item $logDir -ItemType Directory | Out-Null
    }

    $file = Join-Path $logDir "asu-deployment.log"

    $line = "[{0}] {1} {2}" -f (Get-Date -Format "yyyy-MM-dd HH:mm:ss"), $Level, $Message

    Add-Content -Path $file -Value $line
    Write-Host $line
}

function Get-ASUProjectPath {
    param($Config)

    return $Config.open_server.base_dir
}

function Backup-ASUProject {
    param(
        [string]$ProjectPath,
        [string]$Version,
        [string]$Destination
    )

    if (!(Test-Path $ProjectPath)) {
        throw "ASU project path not found"
    }

    if (!(Test-Path $Destination)) {
        New-Item $Destination -ItemType Directory | Out-Null
    }

    $name = "asu_{0}_{1}.zip" -f $Version,(Get-Date -Format "yyyyMMdd_HHmmss")
    $archive = Join-Path $Destination $name

    Compress-Archive -Path "$ProjectPath\*" -DestinationPath $archive

    Write-ASULog "Backup created: $archive" "SUCCESS"

    return $archive
}
