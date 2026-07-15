# ASU v0.2.0-beta-runtime.2 Final Release Check

## Runtime Execution

Before publishing the tag:

```bash
docker compose build
docker compose up -d
```

## Endpoint Verification

```bash
curl http://localhost:8080/
curl http://localhost:8080/health.php
curl http://localhost:8080/status.php
curl http://localhost:8080/metrics.php
curl http://localhost:8080/modules.php
curl http://localhost:8080/dashboard.php
```

## Automated Verification

```bash
bash scripts/runtime-smoke-test.sh
```

## Release Marker

After successful validation:

```
v0.2.0-beta-runtime.2
```

## Current State

Release candidate prepared. Runtime execution is the final gate.
