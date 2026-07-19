# ASU Project Handover

## Purpose

Transfer current ASU development state between chats without restarting analysis.

## Repository

`am190620045-afk/ASU`

Branch:

`main`

## Working process

GitHub is the only source of project changes.

Local copy:

`C:\Project_ASU\ASU`

is used only for:

- git pull;
- build;
- testing;
- Open Server verification.

## Current status

OSP deployment is completed and validated.

Confirmed:

- http://asu.local/ opens.
- http://asu.local/health.php responds.
- `Install-ASU-OSP.ps1 -Mode VERIFY` returns success.

## Completed tasks

- Removed obsolete config.json dependency.
- Migrated installer to runtime configuration architecture.
- Fixed VERSION and project root detection.
- Fixed backup archive creation.
- Implemented Open Server runtime deployment.
- Implemented clean runtime file filtering.
- Restored required Open Server `.osp` metadata.
- Hardened VERIFY health endpoint checking.
- Updated project state documentation.

## Runtime deployment structure

Open Server runtime:

```
C:\OSPanel\home\asu.local

.osp/
config/
public/
VERSION
VERSION.json
```

## Completed milestone

OSP Deployment Improvement.

## Next development phase

ASU 0.3.6 Kernel Configuration Integration.

## New chat continuation rule

Do not restart project analysis.

Continue from the completed OSP deployment state.

Before changes:

```
cd C:\Project_ASU\ASU
git pull origin main
```

When user actions are required, provide:

1. command;
2. working directory;
3. expected result;
4. required output to send back.
