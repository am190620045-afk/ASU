# ==========================================
# ASU Open Server Deployment Kit
# Generate-ASU-SHA256.ps1
# Version 0.2.0-preview
# ==========================================

$Root = Split-Path -Parent $PSScriptRoot
$Release = Join-Path $Root "release"

$zip = Join-Path $Release "ASU-v0.2.0-openserver-preview.zip"
$hashFile = "$zip.sha256"

if (!(Test-Path $zip)) {
    throw "ZIP package not found"
}

$hash = Get-FileHash -Path $zip -Algorithm SHA256

"$($hash.Hash)  $(Split-Path $zip -Leaf)" |
    Set-Content $hashFile -Encoding UTF8

Write-Host "SHA256 generated"
