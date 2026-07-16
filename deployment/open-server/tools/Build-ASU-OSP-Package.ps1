param(
    [string]$Version = "0.2.0"
)

$Root = Split-Path $PSScriptRoot -Parent
$PackageRoot = Split-Path $Root -Parent

$OutputName = "ASU-v$Version-openserver-preview.zip"
$Output = Join-Path $PackageRoot $OutputName

$Include = @(
    "README-OPEN-SERVER.md",
    "VERSION",
    "config.json",
    "install",
    "lib",
    "templates",
    "migrations",
    "deployment",
    "checksums"
)

$temp = Join-Path $env:TEMP "ASU-OSP-Build"

if (Test-Path $temp) {
    Remove-Item $temp -Recurse -Force
}

New-Item $temp -ItemType Directory | Out-Null

foreach($item in $Include){
    $source = Join-Path $Root $item
    if(Test-Path $source){
        Copy-Item $source -Destination $temp -Recurse
    }
}

if(Test-Path $Output){
    Remove-Item $Output -Force
}

Compress-Archive -Path "$temp\*" -DestinationPath $Output

$hash = Get-FileHash $Output -Algorithm SHA256
$checksumDir = Join-Path $Root "checksums"

if (!(Test-Path $checksumDir)) {
    New-Item $checksumDir -ItemType Directory | Out-Null
}

"$($hash.Hash)  $OutputName" | Out-File (Join-Path $checksumDir "SHA256SUMS.txt") -Encoding utf8

Write-Host "Package created: $Output"
