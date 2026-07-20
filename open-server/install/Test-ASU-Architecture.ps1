param(
    [string]$ProjectRoot = (Resolve-Path (Join-Path $PSScriptRoot "..\.."))
)

$ErrorActionPreference = "Stop"

function Test-PathRequired {
    param(
        [string]$Path,
        [string]$Name
    )

    if (Test-Path $Path) {
        Write-Host "OK: $Name"
        return $true
    }

    Write-Warning "MISSING: $Name ($Path)"
    return $false
}

Write-Host "ASU Architecture Check"
Write-Host "======================"

$runtimeOk = $true
$payloadOk = $true

Write-Host ""
Write-Host "Runtime:"
$runtimeOk = (Test-PathRequired (Join-Path $ProjectRoot "public\index.php") "Runtime index.php") -and $runtimeOk
$runtimeOk = (Test-PathRequired (Join-Path $ProjectRoot "public\health.php") "Runtime health.php") -and $runtimeOk

Write-Host ""
Write-Host "Deployment Payload:"
$payloadOk = (Test-PathRequired (Join-Path $ProjectRoot "open-server\payload\public\index.php") "Payload index.php") -and $payloadOk
$payloadOk = (Test-PathRequired (Join-Path $ProjectRoot "open-server\payload\public\health.php") "Payload health.php") -and $payloadOk

Write-Host ""
Write-Host "Version:"
$versionFile = Join-Path $ProjectRoot "VERSION"
$payloadVersionFile = Join-Path $ProjectRoot "open-server\payload\VERSION"

if ((Test-Path $versionFile) -and (Test-Path $payloadVersionFile)) {
    $version = (Get-Content $versionFile -Raw).Trim()
    $payloadVersion = (Get-Content $payloadVersionFile -Raw).Trim()

    if ($version -eq $payloadVersion) {
        Write-Host "OK: Version $version"
    }
    else {
        Write-Warning "Version mismatch: Runtime=$version Payload=$payloadVersion"
    }
}
else {
    Write-Warning "VERSION file check skipped"
}

Write-Host ""
if ($runtimeOk -and $payloadOk) {
    Write-Host "Architecture: VALID"
    exit 0
}

Write-Warning "Architecture: INVALID"
exit 1
