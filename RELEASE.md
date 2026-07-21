# ASU Release Documentation

## Release Status

Current project state:

- Branch analysis completed.
- Runtime Hardening completed.
- Runtime/Payload separation confirmed.
- Runtime Smoke Validation completed.
- Project documentation synchronized.

## Architecture Boundaries

Runtime:

/public

Open Server Toolkit:

/open-server

Deployment Payload:

/open-server/payload

Installer:

open-server/install/Install-ASU-OSP.ps1

Installer continues using Runtime source `/public`.

## Integration Policy

Changes are integrated by isolated packages:

- Runtime;
- CI;
- Release;
- Deployment.

The commit `16347e5529fa3792b94c1f65ac2f7818f6924070` must not be used as a full cherry-pick source because it contains changes from multiple zones.

## Current Release Scope

This document describes release state only.

No Runtime, Installer, Migration, Rollback, or Deployment implementation changes are included.
