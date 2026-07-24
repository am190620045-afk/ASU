# ASU Open Server Migrations

Migration scripts are executed during version upgrades.

Naming convention:

```
FROM-to-TO.ps1
```

Example:

```
0.1.0-to-0.2.0.ps1
```

Flow:

1. Backup current installation.
2. Detect current version.
3. Execute migrations sequentially.
4. Validate installation.
5. Generate deployment report.
