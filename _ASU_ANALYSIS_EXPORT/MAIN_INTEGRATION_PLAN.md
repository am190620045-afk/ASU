# ASU MAIN Integration Plan

Дата: 2026-07-20

## Источник

Анализ дополнительных веток относительно main.

## Готово к интеграции

### Runtime Hardening

- public/health.php
- public/status.php
- public/metrics.php
- apache/asu.conf

### Release Validation

- runtime smoke tests
- release documentation
- release gate checks

### CI Quality Gates

- PHP validation
- Composer validation
- Security checks
- Nginx validation

## После адаптации

Open Server Toolkit:

- ASU-Checksum.ps1
- ASU-Version.ps1
- ASU-Diagnostics.ps1

## Отложено

- Installer rewrite
- Migration Engine
- Rollback Engine
- feature/v0.2.0-beta direct merge

## Конфликтные зоны

Требуют ручной проверки:

- VERSION.json
- Dockerfile
- .github/workflows
- apache configuration
- open-server files

## Правило архитектуры

Runtime:
/public

Deployment Payload:
/open-server/payload

Installer использует Runtime и не переводится на Payload.
