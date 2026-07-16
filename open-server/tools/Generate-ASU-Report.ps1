# ==========================================
# ASU Open Server Deployment Kit
# Generate-ASU-Report.ps1
# Version 0.2.0-preview
# ==========================================

$Root = Split-Path -Parent $PSScriptRoot

$reportDir = Join-Path $Root "reports"
if (!(Test-Path $reportDir)) {
    New-Item -ItemType Directory $reportDir | Out-Null
}

$envFile = Join-Path $reportDir "environment-report.json"

if (Test-Path $envFile) {
    $environment = Get-Content $envFile -Raw | ConvertFrom-Json
}
else {
    $environment = @{}
}

$version = Get-Content "$Root\VERSION" -ErrorAction SilentlyContinue

$html = @"
<html>
<head><title>ASU Deployment Report</title></head>
<body>
<h1>ASU Deployment Report</h1>
<h2>Version</h2>
<p>$version</p>
<h2>Environment</h2>
<pre>
$($environment | ConvertTo-Json -Depth 5)
</pre>
<p>Generated: $(Get-Date)</p>
</body>
</html>
"@

Set-Content (Join-Path $reportDir "ASU-report.html") $html -Encoding UTF8

Write-Host "Report generated"
