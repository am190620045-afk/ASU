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

Quick start:

```bash
docker compose build
docker compose up -d
```

Runtime:

```
http://localhost:8080/
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
