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

## Интеграционные решения

Интеграция выполняется пакетами:

- Runtime;
- CI;
- Release;
- Deployment;
- Web Application Foundation.

Runtime Hardening:

Статус: COMPLETED.

Runtime Smoke Validation:

Статус: COMPLETED.

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

## Web Runtime Validation

Статус: PASSED.

Проверенная среда:

- Open Server Panel 6.5.1;
- Apache;
- PHP 8.5.

Минимальная поддерживаемая версия PHP:
8.3.

Проверено:
- public entrypoint;
- Composer autoload;
- Application bootstrap;
- HTTP layer;
- Routing;
- Controller;
- View Renderer;
- Template rendering.

Документ:
docs/WEB_RUNTIME_VALIDATION.md

## Следующий этап

Application Layer development.

Порядок разработки:

1. Database Foundation.
2. User Authentication.
3. Administration Panel.
4. Theme Management System.

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
