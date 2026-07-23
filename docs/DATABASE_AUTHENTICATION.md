# Database-backed Authentication

## Overview

ASU authentication is connected to the database layer through the following flow:

```
HTTP Request
    |
    v
AuthController
    |
    v
Authenticator
    |
    v
UserRepository
    |
    v
DatabaseInterface
    |
    v
DatabaseConnection
    |
    v
MySQL users table
    |
    v
Session
    |
    v
Dashboard
```

## Database Migration

Apply the migration:

```
database/migrations/001_create_users.sql
```

The users table contains:

- id
- username
- password_hash
- email
- role
- status
- created_at
- updated_at

## Admin User Seed

The administrator seed is located at:

```
database/seeds/001_admin_user.sql
```

The password value must be generated using ASU PasswordHasher. Plain text passwords must not be stored in the database.

## Local Database Setup

Example MySQL commands:

```
CREATE DATABASE asu CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

mysql -u root -p asu < database/migrations/001_create_users.sql
mysql -u root -p asu < database/seeds/001_admin_user.sql
```

## Verification

Authentication verification path:

```
/login
    |
    v
UserRepository lookup
    |
    v
password_verify()
    |
    v
Session login
    |
    v
/dashboard
```
