# ==========================================
# ASU Open Server Deployment Kit
# ASU-Common.ps1
# Version 0.2.1-preview
# ==========================================

$ASURoot = Split-Path -Parent $PSScriptRoot

function Get-ASU-Root {
    return $ASURoot
}

function Get-ASU-Version {
    $file = Join-Path (Split-Path -Parent $ASURoot) "VERSION"
    if (!(Test-Path $file)) { throw "VERSION missing" }
    return (Get-Content $file).Trim()
}

function Initialize-ASU-Runtime {
param([string]$ProjectPath)

    $dir = Join-Path $ProjectPath ".asu"
    if (!(Test-Path $dir)) {
        New-Item -ItemType Directory -Path $dir | Out-Null
    }
}

function Write-ASU-State {
param([string]$ProjectPath,[string]$State)

    $file = Join-Path $ProjectPath ".asu\deployment-state.json"
    @{state=$State;version=(Get-ASU-Version);timestamp=(Get-Date)} |
        ConvertTo-Json |
        Set-Content $file
}

function Write-ASU-Log {
param([string]$Message,[string]$Level="INFO")

    $folder = Join-Path $ASURoot "reports"
    if (!(Test-Path $folder)) { New-Item -ItemType Directory $folder | Out-Null }
    @{time=(Get-Date);level=$Level;message=$Message} |
        ConvertTo-Json |
        Add-Content (Join-Path $folder "deployment-log.json")
}

function New-ASU-Backup {
param([string]$ProjectPath)

    $backup = Join-Path $ProjectPath "backups"
    if (!(Test-Path $backup)) { New-Item -ItemType Directory -Path $backup | Out-Null }

    $name = "asu_$(Get-ASU-Version)_$(Get-Date -Format yyyyMMdd_HHmmss).zip"
    $target = Join-Path $backup $name

    $items = Get-ChildItem -Path $ProjectPath -Force | Where-Object {
        $_.Name -notin @("backups", ".asu", "reports")
    }

    Compress-Archive -Path $items.FullName -DestinationPath $target
    return $target
}
