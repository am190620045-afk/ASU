# ==========================================
# ASU Open Server Deployment Kit
# Set-ASU-Release-Ready.ps1
# Version 0.2.0-preview
# ==========================================

$Root = Split-Path -Parent $PSScriptRoot
$Release = Join-Path $Root "release"

$required = @(
    "ASU-v0.2.0-openserver-preview.zip",
    "ASU-v0.2.0-openserver-preview.zip.sha256",
    "manifest.json",
    "package-test.json",
    "release-verification.json",
    "RELEASE-REPORT.md"
)

$failed = @()

foreach($item in $required) {
    if(!(Test-Path (Join-Path $Release $item))) {
        $failed += $item
    }
}

if($failed.Count -gt 0) {
    throw "Release is not ready: $($failed -join ', ')"
}

@{
    release = "ASU-v0.2.0-openserver-preview"
    status = "READY FOR OPEN SERVER TEST"
    checked = (Get-Date -Format "yyyy-MM-dd HH:mm:ss")
} | ConvertTo-Json | Set-Content (Join-Path $Release "release-status.json")

Write-Host "ASU-v0.2.0-openserver-preview"
Write-Host "STATUS: READY FOR OPEN SERVER TEST"
