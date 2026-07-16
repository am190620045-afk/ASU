# ASU Production Preview Deployment

## Flow

Server -> Docker -> ASU runtime -> Reverse proxy -> HTTPS

## Prepare

```bash
cp env/.env.production.example env/.env.production
```

Configure real server values locally.

## Start runtime

```bash
docker compose -f docker-compose.production.yml up -d
```

## Verify

```bash
curl http://127.0.0.1:8080/health.php
curl http://127.0.0.1:8080/status.php
curl http://127.0.0.1:8080/metrics.php
```

## Before public access

- enable HTTPS
- configure firewall
- verify certificates
- confirm internal paths are blocked
- never commit production secrets
