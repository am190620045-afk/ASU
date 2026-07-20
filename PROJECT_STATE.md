# ASU PROJECT STATE

Дата обновления:
2026-07-20

## Репозиторий

GitHub:
am190620045-afk/ASU

Branch:
main

## Выполнено

Завершено сравнение дополнительных веток с main.

Проверены:
- develop;
- ci/v0.2.0-github-actions;
- release/v0.2.0-beta-runtime.2;
- chore/v0.2.0-runtime-hardening;
- feature/open-server-deployment-kit-v0.2.0;
- feature/v0.2.0-beta.

## Подтвержденная архитектура

Runtime:
/public

Deployment Payload:
/open-server/payload

Installer:
open-server/install/Install-ASU-OSP.ps1

Источник Runtime:
/public

## Результаты анализа

Runtime Hardening:

Статус:
COMPLETED

Причина:
Runtime hardening изменения уже находятся в main.

Не выполнять полный cherry-pick commit 16347e5529fa3792b94c1f65ac2f7818f6924070.

## Текущая интеграция

Runtime Smoke Validation:

Статус:
IN PROGRESS

Scope:
- .github/workflows/runtime-smoke.yml;
- scripts/runtime-smoke-test.sh.

## Следующие этапы

После Runtime Smoke Validation:

1. Release Documentation.
2. CI Quality Gates.
3. Open Server Toolkit helpers.
4. Отдельное решение по Deployment/Migration/Rollback.

## Отложено

- новый Installer;
- Migration Engine;
- Rollback Engine;
- feature/v0.2.0-beta прямой merge.
