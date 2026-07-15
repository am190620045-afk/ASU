# ASU v0.2.0-beta-runtime.2 Deployment

## Requirements

- Docker
- Docker Compose v2

## Build production image

```bash
docker compose build
```

## Start runtime

```bash
docker compose up -d
```

## Verify runtime

Open:

```
http://localhost:8080/
```

Health endpoint:

```
http://localhost:8080/health.php
```

Additional runtime endpoints:

```
/status.php
/metrics.php
/modules.php
/dashboard.php
```

## Logs

```bash
docker compose logs -f asu-runtime
```

## Stop runtime

```bash
docker compose down
```

## Production notes

The container uses:

- PHP 8.4 Apache runtime
- Composer optimized autoload
- OPcache production configuration
- Apache public document root
- Container restart policy
- Runtime health check
