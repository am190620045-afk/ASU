function Get-ASUReleaseDirectory {
    param([string]$Root)

    return Join-Path $Root "deployment"
}

function Get-ASUReleaseArchive {
    param([string]$Root)

    $directory = Get-ASUReleaseDirectory $Root
    $archive = Join-Path $directory "asu-release.zip"

    if (!(Test-Path $archive)) {
        throw "ASU release archive not found: $archive"
    }

    return $archive
}

function Get-ASUReleaseVersion {
    param([string]$Root)

    $file = Join-Path (Get-ASUReleaseDirectory $Root) "release.json"

    if (!(Test-Path $file)) {
        throw "release.json not found"
    }

    return (Get-Content $file -Raw | ConvertFrom-Json).version
}

function Test-ASUReleasePackage {
    param([string]$Root)

    $archive = Get-ASUReleaseArchive $Root
    return (Test-Path $archive)
}
