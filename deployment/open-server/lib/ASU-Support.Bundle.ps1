param(
    [string]$ProjectPath = "C:\OSPanel\home\asu.local"
)

function New-ASUSupportBundle {
    param(
        [string]$OutputPath = "support-bundle"
    )

    if (!(Test-Path $OutputPath)) {
        New-Item -ItemType Directory -Path $OutputPath | Out-Null
    }

    $files = @(
        "reports\environment-report.json",
        "reports\deployment-log.json",
        ".asu\installation.json",
        ".asu\deployment-state.json",
        "reports\test-result.json"
    )

    foreach($file in $files){
        $source = Join-Path $ProjectPath $file
        if(Test-Path $source){
            Copy-Item $source $OutputPath -Force
        }
    }

    Write-Host "ASU support bundle prepared: $OutputPath"
}

Write-Host "ASU Support Bundle module loaded"
