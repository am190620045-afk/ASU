function Get-ASUMigrationDirectory {
    param([string]$Root)

    return Join-Path $Root "migrations"
}

function Get-ASUMigrations {
    param(
        [string]$Root,
        [string]$FromVersion,
        [string]$ToVersion
    )

    $directory = Get-ASUMigrationDirectory $Root

    if (!(Test-Path $directory)) {
        return @()
    }

    return Get-ChildItem $directory -Filter "*.ps1" |
        Where-Object { $_.Name -like "*$ToVersion*" }
}

function Invoke-ASUMigration {
    param(
        [string]$Root,
        [string]$FromVersion,
        [string]$ToVersion
    )

    $migrations = Get-ASUMigrations $Root $FromVersion $ToVersion

    foreach($migration in $migrations){
        Write-ASULog "Running migration: $($migration.Name)"
        & $migration.FullName
    }

    Write-ASULog "Migration completed" "SUCCESS"
}
