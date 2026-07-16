# ASU Open Server Preview Guide

## Target Environment

ASU v0.2.0 Open Server Preview is prepared for:

- Open Server Panel 6.5.1
- Apache
- PHP 8.5
- MySQL 8.4

## PHP Compatibility

Minimum supported version:

PHP 8.3+

Recommended development and runtime version:

PHP 8.5

## Installation Flow

### 1. Create local domain

Create an Open Server domain pointing to the ASU project.

Recommended document root:

```
/path/to/asu/public
```

### 2. Configure environment

Copy:

```
openserver/.env.openserver.example
```

to the project environment file.

Configure database credentials.

### 3. Install dependencies

Run:

```bash
composer install --no-dev --optimize-autoloader
```

### 4. Prepare database

Create MySQL 8.4 database using utf8mb4.

### 5. Check environment

Open:

```
/openserver/check-environment.php
```

Verify PHP, extensions and runtime requirements.

### 6. Start ASU

Open the local ASU domain in browser.

## Runtime Checklist

- Apache running
- PHP 8.5 active
- MySQL 8.4 active
- PDO MySQL enabled
- Required writable directories configured
- Environment configured

## Preview Goal

Validate ASU on a real local server before release automation and production deployment.
