# ASU Project State

## Current checkpoint

Date: 2026-07-19

## Completed

- GitHub is the single source of project changes.
- OSP installer path resolution fixed.
- VERSION and runtime configuration detection fixed.
- Backup creation fixed to exclude generated directories.
- Open Server deployment target implemented.
- asu.local and health.php confirmed working in Open Server.

## Current task

Finalize OSP runtime deployment filtering.

## Current issue

Installer was copying the whole repository into C:\\OSPanel\\home\\asu.local.
The installer is being changed to deploy only runtime files.

## Next step

Run INSTALL and VERIFY after pulling the latest commit.

Next major task after OSP validation:
ASU 0.3.6 Kernel Configuration Integration.
