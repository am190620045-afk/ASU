# ==========================================
# ASU Open Server Deployment Kit
# Generate-ASU-Manifest.ps1
# Version 0.2.0-preview
# ==========================================

$Root = Split-Path -Parent $PSScriptRoot
$Release = Join-Path $Root "release"

if (!(Test-Path $Release)) {
    New-Item -ItemType Directory $Release | Out-Null
}

$manifest = @{
    name = "ASU Open Server Deployment Kit"
    version = (Get-Content "$Root\VERSION").Trim()
    release = "preview"
    created = (Get-Date).ToString("yyyy-MM-dd HH:mm:ss")
    components = @(
        "installer",
        "tests",
        "tools",
        "payload"
    )
}

$manifest | ConvertTo-Json -Depth 5 |
    Set-Content (Join-Path $Release "manifest.json") -Encoding UTF8

Write-Host "Manifest generated"
