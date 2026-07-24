function Convert-ASUVersion {
    param([string]$Version)

    return [version]$Version
}

function Compare-ASUVersion {
    param(
        [string]$Installed,
        [string]$Package
    )

    $current = Convert-ASUVersion $Installed
    $target = Convert-ASUVersion $Package

    if ($target -gt $current) {
        return "UPDATE"
    }

    if ($target -eq $current) {
        return "SAME"
    }

    return "DOWNGRADE"
}

function Get-InstalledASUVersion {
    param([string]$ProjectPath)

    $file = Join-Path $ProjectPath "VERSION"

    if (Test-Path $file) {
        return (Get-Content $file).Trim()
    }

    return "0.0.0"
}
