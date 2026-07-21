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

Назначение:
- рабочее приложение ASU;
- Runtime Kernel;
- web endpoints.

Open Server Toolkit:

/open-server

Deployment Payload:

/open-server/payload

Назначение:
- validation payload;
- preview deployment;
- проверка структуры установки.

## Решение по Installer

open-server/install/Install-ASU-OSP.ps1

Использует Runtime источник:

/public

Installer не переводить на /open-server/payload без отдельного архитектурного решения.

## Анализ веток 2026-07-20

Проверены:
- develop;
- ci/v0.2.0-github-actions;
- release/v0.2.0-beta-runtime.2;
- chore/v0.2.0-runtime-hardening;
- feature/open-server-deployment-kit-v0.2.0;
- feature/v0.2.0-beta.

## Интеграционные решения

Интеграция выполняется пакетами.

Runtime Hardening:

Статус: COMPLETED.

Runtime-изменения уже присутствуют в main.

Commit 16347e5529fa3792b94c1f65ac2f7818f6924070 не использовать как полный cherry-pick источник.

Причина:
- runtime изменения уже интегрированы;
- остальные части commit относятся к другим зонам.

Runtime Smoke Validation:

Статус: COMPLETED.

Причина:
Runtime Smoke workflow и smoke validation script уже интегрированы в main.

Проверенные файлы:
- .github/workflows/runtime-smoke.yml;
- scripts/runtime-smoke-test.sh.

## Open Server Toolkit

Кандидаты:
- ASU-Checksum.ps1;
- ASU-Version.ps1;
- ASU-Diagnostics.ps1 после адаптации.

## Не переносить сейчас

- новый Installer;
- Migration Engine;
- Rollback Engine;
- feature/v0.2.0-beta core изменения.