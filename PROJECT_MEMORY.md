# ASU PROJECT MEMORY

## Проект

ASU — автоматизированная система управления

Репозиторий:
am190620045-afk/ASU

Основная ветка:
main

## Рабочий процесс

GitHub является единственным источником изменений проекта.

Локальная копия используется только для:
- git pull;
- сборки;
- запуска;
- Open Server проверки;
- тестирования.

## Архитектура проекта

Подтверждено разделение:

Runtime:

/public

Open Server Toolkit:

/open-server

Deployment Payload:

/open-server/payload

## Решение по Installer

open-server/install/Install-ASU-OSP.ps1

Использует Runtime источник:

/public

Installer не переводить на /open-server/payload без отдельного архитектурного решения.

## Анализ веток 2026-07-20

Проверены дополнительные ветки относительно main.

## Интеграционные решения

Интеграция выполняется пакетами:

- Runtime;
- CI;
- Release;
- Deployment;
- Web Application Foundation.

Runtime Hardening:

Статус: COMPLETED.

Полный cherry-pick commit 16347e5529fa3792b94c1f65ac2f7818f6924070 не использовать.

Причина:
- Runtime изменения уже интегрированы;
- остальные части commit относятся к другим зонам.

Runtime Smoke Validation:

Статус: COMPLETED.

## Release Documentation

Статус: COMPLETED.

Пакет release-документации:
- RELEASE.md;
- RELEASE_NOTES.md;
- RELEASE_GATE.md;
- FINAL_RELEASE_CHECK.md.

## CI Quality Gates

Статус: COMPLETED.

PR:
#12

Merge commit:
863a78e37e5d36b99199eef8980f717387d5b325

Добавлено:
- .github/workflows/quality-gates.yml;
- scripts/ci/check-forbidden-paths.sh;
- scripts/ci/validate-php.sh;
- scripts/ci/validate-composer.sh;
- scripts/ci/validate-doc-sync.sh.

## Web Application Foundation

Статус: COMPLETED.

PR:
#15

Merge:
feature/web-application-foundation -> main

Добавлено:
- HTTP Request foundation;
- HTTP Response foundation;
- Routing foundation;
- Route object;
- View Renderer foundation.

Изменения выполнены поверх Runtime Foundation без изменения:
- Runtime Core;
- Module System;
- Database Foundation;
- Deployment Layer.

## Open Server Toolkit

Кандидаты:
- ASU-Checksum.ps1;
- ASU-Version.ps1;
- ASU-Diagnostics.ps1 после адаптации.

## Следующий этап

Application Layer development.

## Не переносить сейчас

- новый Installer;
- Migration Engine;
- Rollback Engine;
- feature/v0.2.0-beta core изменения.
