# ASU Project Memory

## Workflow

GitHub repository is the only source of code changes.

Local copy is used only for:
- git pull origin main;
- build;
- testing;
- Open Server verification.

Do not make manual local source changes unless explicitly required.

## Repository

Repository:

am190620045-afk/ASU

Branch:

main

## Environment

Local repository:

C:\Project_ASU\ASU

Open Server:

C:\OSPanel\

Runtime:

C:\OSPanel\home\asu.local

## Completed milestone

OSP Deployment Improvement is completed.

Confirmed:
- asu.local opens;
- health.php responds;
- Install-ASU-OSP.ps1 -Mode VERIFY completes successfully.

## ASU 0.3.6 Kernel Configuration Integration

Current phase:

Kernel Configuration Integration.

Completed:

- added config/kernel.php;
- added src/Config/KernelConfig.php;
- integrated KernelConfig into src/Runtime/Kernel.php.

Architecture:

RuntimeConfig = runtime environment configuration.

KernelConfig = kernel behavior configuration.

## Current investigation

After local Open Server verification, local git status showed changes:

Modified:
- VERSION
- public/health.php
- public/index.php

Untracked:
- .asu/
- .osp/
- README-OSP.txt
- backups/
- composer.lock
- open-server/reports/
- vendor/

These changes are not yet confirmed as project changes.

Do not:
- git restore;
- git reset;
- delete files;
- commit cleanup changes

until GitHub source comparison is completed.

## Next objective

Verify deployment/source separation through GitHub:

open-server/
open-server/payload/

Compare with:

public/

Determine whether deployment payload overwrites source files or changes are only local.

## Communication rule

If actions are required from the user, provide:
1. exact command;
2. exact directory;
3. expected result;
4. what output to return.
