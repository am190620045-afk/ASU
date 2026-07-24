# ASU Open Server Deployment Kit v0.2.0

## Requirements

- Open Server Panel 6.5.1
- Apache
- PHP >= 8.3 (target PHP 8.5)
- MySQL 8.4

Default project location:

```
C:\OSPanel\home\asu.local\
```

Web root:

```
{base_dir}\public
```

## Installation

Run:

```powershell
.\install\Install-ASU-OSP.ps1
```

The installer will:

1. Detect existing ASU installation.
2. Create backup before update/reinstall.
3. Compare installed VERSION with package VERSION.
4. Run migrations when required.
5. Install release package.
6. Validate environment.
7. Generate deployment report.

## Update

Supported flow:

```
v0.1.x -> v0.2.0
```

Update procedure:

```
Backup
  |
Migration
  |
Release install
  |
Validation
  |
Report
```

## Rollback

Backups are stored in:

```
backups/
```

Format:

```
asu_<VERSION>_<DATE_TIME>.zip
```

## Reports

Generated files:

```
reports/test-result.json
reports/ASU-report.html
```

## Open Server configuration

Required file:

```
.osp/project.ini
```

with:

```
web_root={base_dir}\public
```
