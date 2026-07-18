# ASU Database Setup for Open Server Panel 6.5.1

## Requirements

- Open Server Panel 6.5.1
- PHP 8.5
- MySQL 8.4

## Create database

Create database `asu` with UTF-8 support:

```sql
CREATE DATABASE asu
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
```

## Configure connection

Copy `config/database.ini.example` to `config/database.ini` and set local credentials.

Example:

```ini
[database]
driver = mysql
host = 127.0.0.1
port = 3306
database = asu
username = root
password =
charset = utf8mb4
```

## Run migrations

From ASU project root:

```bash
php tools/migrate.php
```

Successful installation creates:

- users
- roles
- permissions
- units
- personnel
- audit_log
- schema_migrations

## Verify

Open:

```
http://asu.local/db-health.php
```
