# ==========================================
# ASU Open Server Deployment Kit
# Preflight-ASU-OSP.ps1
# Version 0.2.0-preview
# ==========================================

$ErrorActionPreference = "Stop"

$result = @()

function Test-ASUCheck {
    param([string]$Name,[bool]$Status,[string]$Details="")

    $result += [PSCustomObject]@{
        check = $Name
        status = if($Status){"OK"}else{"FAILED"}
        details = $Details
    }
}

Test-ASUCheck "PowerShell" ($PSVersionTable.PSVersion.Major -ge 5) $PSVersionTable.PSVersion

Test-ASUCheck "Windows" ($env:OS -like "Windows*") $env:OS

Test-ASUCheck "Open Server path" (Test-Path "C:\OSPanel") "C:\OSPanel"

try {
    $php = php -v 2>$null | Select-Object -First 1
    Test-ASUCheck "PHP" $true $php
}
catch {
    Test-ASUCheck "PHP" $false "PHP not found"
}

try {
    $mysql = mysql --version 2>$null
    Test-ASUCheck "MySQL" $true $mysql
}
catch {
    Test-ASUCheck "MySQL" $false "MySQL not found"
}

$drive = Get-PSDrive C
Test-ASUCheck "Disk space" ($drive.Free -gt 1GB) "$([math]::Round($drive.Free/1GB,2)) GB free"

$out = Join-Path (Split-Path -Parent $PSScriptRoot) "reports\preflight-report.json"

$dir = Split-Path $out
if(!(Test-Path $dir)){
    New-Item -ItemType Directory $dir | Out-Null
}

$result | ConvertTo-Json -Depth 5 | Set-Content $out

$result
