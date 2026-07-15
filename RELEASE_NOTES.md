# ASU v0.2.0-beta-runtime.2 Release Notes

## Summary

ASU v0.2.0-beta-runtime.2 delivers a containerized runtime demo with a real Apache web execution environment.

## Highlights

- Modular runtime kernel
- Lifecycle hook execution
- Runtime persistence and validation
- Metrics and observability layers
- Web runtime dashboard
- Production Docker deployment

## Deployment Stack

- PHP 8.4
- Apache 2.4
- Composer optimized autoload
- Docker Compose
- OPcache production tuning

## Available Endpoints

```
/
/dashboard.php
/health.php
/metrics.php
/modules.php
/status.php
```

## Verification

Validation is performed through:

```bash
bash scripts/runtime-smoke-test.sh
```

and CI runtime smoke workflow.

## Release Stage

Beta demo release candidate.

Final publication requires successful runtime execution and version tag creation.
