Write-Host "ASU Runtime Web Validation"
Write-Host "---------------------------"

Write-Host "Loading RuntimeWebTest.php"
Write-Host "Application -> ServiceContainer -> Router -> Admin Dashboard"

Write-Host "Manual execution required in PHP runtime:"
Write-Host "php -r \"require 'autoload.php'; (new ASU\\Tests\\RuntimeWebTest())->run();\""
