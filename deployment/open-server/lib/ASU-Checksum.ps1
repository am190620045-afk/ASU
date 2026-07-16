function Get-ASUChecksumFile {
    param([string]$Root)

    return Join-Path $Root "checksums\SHA256SUMS.txt"
}

function Get-ASUArchiveHash {
    param([string]$Archive)

    if (!(Test-Path $Archive)) {
        throw "Archive not found: $Archive"
    }

    return (Get-FileHash $Archive -Algorithm SHA256).Hash.ToLower()
}

function Test-ASUChecksum {
    param(
        [string]$Archive,
        [string]$Root
    )

    $checksumFile = Get-ASUChecksumFile $Root

    if (!(Test-Path $checksumFile)) {
        Write-ASULog "Checksum file missing" "WARN"
        return $false
    }

    $hash = Get-ASUArchiveHash $Archive
    $line = Get-Content $checksumFile | Where-Object { $_ -match [regex]::Escape((Split-Path $Archive -Leaf)) }

    if (!$line) {
        return $false
    }

    return ($line -match $hash)
}
