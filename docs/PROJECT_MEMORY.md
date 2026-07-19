# ASU Project Memory

## Purpose

This document contains only verified project decisions and correct working procedures.

It is not a history of errors or experiments.

When a solution is finalized, only the correct implementation approach is recorded.

---

## Project Information

Repository:

`am190620045-afk/ASU`

Local development workspace:

`C:\Project_ASU\ASU`

Open Server Panel environment:

- Open Server Panel 6.5.1
- PHP 8.5.4
- Composer 2.10.2

---

## Development Workflow

GitHub is the only source of code changes.

Local copy is used only for:

- git pull
- build
- testing
- deployment verification

Deployment target:

`C:\OSPanel\home\asu.local`

---

## Architecture Decisions

### Runtime Configuration

Runtime configuration is centralized:

`config/runtime.php`

Configuration access layer:

`src/Config/RuntimeConfig.php`

Bootstrap and Metadata use RuntimeConfig.

---

## Verified ASU Milestones

### ASU 0.3.5.1 — Bootstrap Configuration Verification

Status:

Verified

Validated:

- Runtime Health
- Bootstrap initialization
- Metadata generation
- RuntimeConfig integration

---

## Open Server Panel 6.5.1 Deployment

ASU deployment uses the prepared Open Server payload structure.

Source deployment package:

`open-server/payload`

The payload contains Open Server project configuration:

`.osp/project.ini`

and web entry points:

`public/index.php`

`public/health.php`

The repository root is not used as a direct deployment source.

---

## Deployment Principles

Always preserve Open Server project configuration.

Deployment must be explicit and controlled.

Do not mirror the complete repository into the OSP runtime directory.

The deployment process must separate:

- source code;
- OSP configuration;
- web runtime files.

---

## Open Server Deployment Improvement

Verified implementation direction:

- deployment starts from `open-server/payload`;
- payload structure is validated before copying;
- required web entry points are checked;
- deployment execution remains controlled through Install-ASU-OSP.ps1;
- deployment reporting is generated as part of runtime deployment preparation;
- VERIFY mode validates installed runtime state after deployment.

The repository source tree remains separated from Open Server runtime files.

---

## Current Development Direction

Next planned stage:

ASU 0.3.6 — Kernel Configuration Integration

Parallel task:

Complete clean reproducible Open Server Panel 6.5.1 deployment verification.
