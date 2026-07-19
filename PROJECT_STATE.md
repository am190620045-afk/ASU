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
- Required .osp metadata restored.
- asu.local and health.php confirmed working in Open Server.

## Current task

Finalize OSP installer verification hardening.

## Current issue

Browser and Open Server resolved asu.local correctly, but PowerShell Invoke-WebRequest depended on local DNS resolution.
The VERIFY health check is changed to use localhost with Host header routing.

## Next step

Run INSTALL and VERIFY after pulling the latest commit.

Next major task after OSP validation:
ASU 0.3.6 Kernel Configuration Integration.
