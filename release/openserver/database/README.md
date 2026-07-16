# ASU Database Setup - Open Server

Target:

- Open Server Panel 6.5.1
- MySQL 8.4

## Option 1: phpMyAdmin

1. Open phpMyAdmin from Open Server.
2. Create database:

```
asu
```

Encoding:

```
utf8mb4
```

3. Create application user.
4. Import schema if required.

## Option 2: Console

Run:

```bash
mysql -u root -p < create_database.sql
```

## Environment

Configure:

```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=asu
DB_USERNAME=asu_user
```
