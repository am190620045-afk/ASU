# Step 05 - Runtime Verification

After configuring Open Server:

## Verify PHP

Expected:

- PHP 8.5 active
- PHP >= 8.3 supported

## Verify extensions

Required:

- PDO
- PDO MySQL
- mbstring
- openssl
- curl
- intl
- json
- fileinfo
- zip

## Verify Apache

- DocumentRoot points to ASU/public
- Runtime endpoints are reachable
- Internal directories are protected

## Verify database

- MySQL 8.4 running
- ASU database exists
- Application can connect
