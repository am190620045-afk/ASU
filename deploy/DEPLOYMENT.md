# ASU Production Deployment

## Requirements

- Docker
- Docker Compose
- Public server with required ports available

## Start

```bash
cp .env.example .env
docker compose -f docker-compose.prod.yml up -d
```

## Verify

```bash
curl http://localhost:8080/health.php
curl http://localhost:8080/status.php
```

The deployment profile is intended for ASU v0.2.0-beta-runtime.2 web preview.