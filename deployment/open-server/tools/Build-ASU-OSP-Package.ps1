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
    "templates"
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

Write-Host "Package created: $Output"
