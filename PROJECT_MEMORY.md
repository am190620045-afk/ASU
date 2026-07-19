# ASU Project Memory

## Workflow

GitHub repository is the only source of code changes.

Local copy is used only for:
- git pull;
- build;
- testing;
- Open Server verification.

Do not make untracked manual changes in the local copy unless explicitly required.

## Repository

Repository:

am190620045-afk/ASU

Branch:

main

## Completed deployment milestone

OSP Deployment Improvement is completed.

## Confirmed working

- Open Server site asu.local opens.
- health.php responds.
- PHP/Open Server environment is operational.
- Install-ASU-OSP.ps1 VERIFY mode completes successfully.

## Important fixes completed

- Removed obsolete config.json dependency.
- Migrated installer to current config runtime architecture.
- Fixed VERSION and runtime file detection.
- Fixed backup archive generation issues.
- Separated runtime deployment from repository source.
- Restored required .osp Open Server metadata.
- Hardened VERIFY health checking for Open Server local routing.

## Current continuation point

Start ASU 0.3.6 Kernel Configuration Integration.

Do not restart OSP deployment analysis unless a new deployment problem appears.

## Communication rule

If actions are required from the user, provide:
1. exact command;
2. exact directory;
3. expected result;
4. what output to return.
