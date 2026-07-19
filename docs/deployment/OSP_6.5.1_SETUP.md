# Open Server Panel 6.5.1 — ASU deployment notes

## Purpose

This document stores the Open Server Panel 6.5.1 deployment rules for the ASU project.

## Source of changes

GitHub repository is the only source of application changes:

`am190620045-afk/ASU`

Local development copy:

`C:\Project_ASU\ASU`

Open Server runtime project:

`C:\OSPanel\home\asu.local`

## Open Server Panel 6.5.1 structure

Do not assume the old `C:\OSPanel\domains` structure exists.

ASU is deployed as an Open Server project under:

`C:\OSPanel\home\asu.local`

Open Server project configuration files must be preserved.

## Deployment rule

Never use:

```powershell
robocopy C:\Project_ASU\ASU C:\OSPanel\home\asu.local /MIR
```

Reason: `/MIR` can copy repository service files and remove Open Server specific project files.

Use explicit exclusions during deployment:

```powershell
robocopy C:\Project_ASU\ASU C:\OSPanel\home\asu.local /E /XD .git .github docs tests build logs /XF Dockerfile docker-compose.yml README.md README.txt CHANGELOG.md MANIFEST.txt FINAL_RELEASE_CHECK.md /R:2 /W:2 /TEE
```

## Verification environment

Confirmed environment:

- Open Server Panel 6.5.1
- PHP 8.5.4
- Composer 2.10.2

## Runtime verification

After deployment check:

`http://asu.local/`

Expected:

```json
{
  "kernel": "ready",
  "booted": true
}
```

Check:

`http://asu.local/health.php`

Expected:

```json
{
  "status": "ok"
}
```

## Recovery note

If OSP stops seeing `asu.local`, first restore the Open Server project structure and configuration. Do not immediately overwrite the directory with a repository mirror.
