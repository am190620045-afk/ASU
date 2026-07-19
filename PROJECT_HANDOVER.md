# ASU Project Handover

## Purpose

Transfer current ASU development state between chats without restarting analysis.

## Repository

`am190620045-afk/ASU`

Branch:

`main`

## Current status

OSP deployment reached a working web state:

- http://asu.local/ opens.
- http://asu.local/health.php responds.

## Completed tasks

- GitHub-only change workflow preserved.
- Removed obsolete config.json dependency.
- Migrated installer to runtime configuration model.
- Fixed VERSION and project root detection.
- Fixed backup archive self-inclusion.
- Added Open Server runtime deployment target.
- Implemented clean runtime file filtering.
- Restored required Open Server metadata deployment.
- Updated project state documentation.
- Hardened VERIFY health check against local DNS resolution issues.

## Current correction

Installer deploys only runtime files and required OSP metadata:

- .osp/
- VERSION
- VERSION.json
- config/
- public/

VERIFY now checks health through localhost routing with Host header instead of depending on DNS lookup of asu.local.

## Validation steps

Run:

```
git pull origin main
cd C:\Project_ASU\ASU\open-server\install
.\Install-ASU-OSP.ps1 -Mode VERIFY
```

Verify:

- http://asu.local/
- http://asu.local/health.php

## Next development phase

After successful OSP validation:

ASU 0.3.6 Kernel Configuration Integration.

## Continuation rule

Do not restart project analysis. GitHub is the source of changes. Local copy is used only for pull, build, testing and Open Server verification.
