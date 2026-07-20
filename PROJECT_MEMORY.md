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

## Решения

Интеграция выполняется пакетами.

Высокий приоритет:
- Runtime Hardening;
- Runtime Release Validation;
- CI Quality Gates.

Open Server Toolkit переносится выборочно:
- ASU-Checksum.ps1;
- ASU-Version.ps1;
- ASU-Diagnostics.ps1 после адаптации.

Не переносить сейчас:
- новый Installer;
- Migration Engine;
- Rollback Engine;
- feature/v0.2.0-beta core изменения.
