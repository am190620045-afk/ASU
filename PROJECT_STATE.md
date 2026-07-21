# ASU PROJECT STATE

Дата обновления:
2026-07-21

## Репозиторий

GitHub:
am190620045-afk/ASU

Branch:
main

## Development Freeze Point

Статус:
FROZEN

Дата:
2026-07-21

Freeze document:
_ASU_ANALYSIS_EXPORT/FREEZE_POINT_2026-07-21.md

Baseline:
da88624f59cccddb78bb558dec9c9421b50ec5e4

## Выполнено

Завершено:
- анализ веток;
- Runtime Hardening;
- Runtime/Payload separation;
- Runtime Smoke Validation;
- Release Documentation package;
- CI Quality Gates;
- Documentation Synchronization.

## Подтвержденная архитектура

Runtime:
/public

Deployment Payload:
/open-server/payload

Installer:
open-server/install/Install-ASU-OSP.ps1

Источник Runtime:
/public

## Текущая интеграция

Release Documentation:

Статус:
COMPLETED

Runtime Smoke Validation:

Статус:
COMPLETED

CI Quality Gates:

Статус:
COMPLETED

PR:
#12

Merge commit:
863a78e37e5d36b99199eef8980f717387d5b325

## Приостановленные этапы

Open Server Toolkit helpers:

Статус:
PAUSED

Разработка не начиналась.

## Следующая точка после разморозки

Определяется отдельным решением.

## Не выполнять без согласования

- новый Installer;
- перенос Installer на payload;
- Migration Engine;
- Rollback Engine;
- feature/v0.2.0-beta прямой merge;
- изменение deployment архитектуры.