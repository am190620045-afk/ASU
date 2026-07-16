# Step 01 - Database Setup

## MySQL 8.4

Create database:

```sql
CREATE DATABASE asu CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Configure credentials in `.env.openserver`.

Verify:

- MySQL service is running
- PDO MySQL extension is enabled
- Database user has required permissions
