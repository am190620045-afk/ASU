# ASU Project State

## Current checkpoint

Date: 2026-07-19

## Completed

- GitHub is the single source of project changes.
- OSP installer path resolution fixed.
- VERSION and runtime configuration detection fixed.
- Backup creation fixed to exclude generated directories.
- Open Server deployment target implemented.
- Clean runtime deployment filtering implemented.
- asu.local and health.php confirmed working in Open Server.

## Current task

Finalize OSP runtime deployment with required Open Server metadata.

## Current issue

Runtime filtering removed repository files correctly, but also removed required OSP metadata.
The installer now restores only .osp metadata together with runtime files.

## Next step

Run INSTALL and VERIFY after pulling the latest commit.

Next major task after OSP validation:
ASU 0.3.6 Kernel Configuration Integration.
