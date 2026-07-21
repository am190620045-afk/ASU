# ASU Development Freeze Point

Дата фиксации:
2026-07-21

## Последнее стабильное состояние

Repository:

am190620045-afk/ASU

Main baseline:

da88624f59cccddb78bb558dec9c9421b50ec5e4

## Завершенные этапы

COMPLETED:

- анализ веток;
- Runtime Hardening;
- Runtime Smoke Validation;
- Release Documentation;
- CI Quality Gates;
- Documentation Synchronization.

## Интегрированные PR

PR #12

ci: add quality gates

Merge:
863a78e37e5d36b99199eef8980f717387d5b325

PR #13

docs: update project state after CI Quality Gates

Merge:
da88624f59cccddb78bb558dec9c9421b50ec5e4

## Архитектурная фиксация

Runtime:

/public

Open Server Toolkit:

/open-server

Deployment Payload:

/open-server/payload

Installer:

open-server/install/Install-ASU-OSP.ps1

Installer продолжает использовать Runtime источник /public.

## Замороженный этап

Open Server Toolkit helpers

Status:
PAUSED

Причина:

Этап подготовлен концептуально, но разработка не начиналась.
Возврат к нему выполнять только после отдельного решения по направлению развития.

## Ограничения

Не выполнять без отдельного согласования:

- перенос Installer на payload;
- изменение Runtime источника;
- Migration Engine;
- Rollback Engine;
- изменение deployment архитектуры;
- полный merge feature/v0.2.0-beta.

## Возобновление работы

Перед продолжением:

1. Прочитать:
   - PROJECT_MEMORY.md;
   - PROJECT_STATE.md;
   - PROJECT_HANDOVER.md;
   - этот Freeze Point.

2. Не повторять анализ Runtime, Release и CI Quality Gates.

3. Продолжить с выбранного нового направления.
