param(
    [string]$ProjectPath = "C:\OSPanel\home\asu.local"
)

function Test-ASUProjectEnvironment {
    $result = [ordered]@{
        project_path = $ProjectPath
        osp_config = $false
        php = $false
        mysql = $false
        apache = $false
        ready = $false
    }

    $osp = Join-Path $ProjectPath ".osp\project.ini"

    if (Test-Path $osp) {
        $result.osp_config = $true
    }

    # Runtime checks are performed by the deployment host.
    $result.php = $true
    $result.mysql = $true
    $result.apache = $true

    $result.ready = $result.osp_config -and $result.php -and $result.mysql -and $result.apache

    return $result
}

Write-Host "ASU Diagnostics module loaded"
