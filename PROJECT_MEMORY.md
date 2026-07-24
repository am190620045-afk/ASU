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

## Web Application Foundation

Статус: COMPLETED.

Добавлено:
- HTTP Request foundation;
- HTTP Response foundation;
- Routing foundation;
- Route object;
- View Renderer foundation.

## Текущий этап

Application Layer development.

Порядок разработки:
1. Database Foundation.
2. User Authentication.
3. Administration Panel.
4. Theme Management System.

## Auth Core Stabilization

Статус:
IN PROGRESS

Подтверждено:
- ApplicationFactory authentication wiring;
- AuthGuard session validation;
- Middleware authentication flow;
- protected route handling.

Исправление:
- AuthMiddleware теперь поддерживает public routes.

Public routes:
- GET /;
- GET /login;
- POST /login.

## Следующие направления

- RBAC;
- User Management;
- Administration Panel;
- Audit Log.

## Не переносить сейчас

- новый Installer;
- Migration Engine;
- Rollback Engine;
- feature/v0.2.0-beta core изменения.