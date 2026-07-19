# ASU Project State

## Current checkpoint

Date: 2026-07-19

## Completed

- GitHub is the single source of project changes.
- OSP installer path resolution fixed.
- VERSION and runtime configuration detection fixed.
- Backup creation fixed.
- Open Server deployment target implemented.
- Clean runtime deployment filtering implemented.
- Required .osp metadata restored.
- asu.local and health.php confirmed working in Open Server.
- Install-ASU-OSP.ps1 -Mode VERIFY completed successfully.

## Completed milestone

OSP Deployment Improvement completed.

## Final deployment state

Runtime deployment contains only:

- .osp/
- VERSION
- VERSION.json
- config/
- public/

Repository development files are not copied into Open Server runtime.

## Next development phase

ASU 0.3.6 Kernel Configuration Integration.

## Continuation requirements

Do not restart previous OSP investigation.
Continue from the validated deployment state.

If user actions are required, provide detailed commands, location, expected output and required response.
