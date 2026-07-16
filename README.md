# ASU

## ASU v0.2.0-beta-runtime.2

Automated System Unit (ASU) runtime platform.

## Overview

ASU is a modular application runtime platform with lifecycle management, persistence, validation, observability, metrics, and web runtime capabilities.

The current milestone delivers a runnable containerized demo runtime through PHP 8.4 Apache.

## Current Status

Runtime demo release preparation.

Implemented:

- Runtime Kernel
- Module Lifecycle Hooks
- Runtime Persistence
- Runtime State Validation
- Metrics Layer
- Performance Layer
- Observability Layer
- Web Runtime Layer
- Docker production foundation
- Apache public document root deployment
- Composer production build
- OPcache runtime optimization

## Web Endpoints

```
/
/dashboard.php
/health.php
/metrics.php
/modules.php
/status.php
```

## Deployment

See:

```
DEPLOYMENT.md
```

## Production Preview

Prepare environment:

```bash
cp .env.example .env
```

Build and start runtime:

```bash
docker compose build
docker compose up -d
```

Verify runtime health:

```bash
curl http://localhost:8080/health.php
```

Internal application directories should not be exposed publicly:

```
/src
/config
/vendor
/storage
```

## Technology Stack

- PHP 8.4+
- Apache 2.4
- Composer
- Docker
- Docker Compose

## Versioning

Current version:

`ASU v0.2.0-beta-runtime.2`

## License

Project license will be defined during the next development stage.
